<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\DB;

class CartView extends Component
{
    use Actions;

    public $cart;
    public $totalPrice = 0;
    public $cartProperties;


    public function incrementQty(int $cartId)
    {
        $CartData = Cart::where('id', $cartId)->where('user_id', \auth()->user()->id)->first();
        if($CartData){
            if($CartData->product->qty > $CartData->qty){
                
                $CartData->increment('qty');
                // $this->emit('CarAddedUbdated');
                $this->notification()->success(
                $title = '',
                $description = ''
                );
            }
        }else{
            $this->notification()->error(
                $title = 'غير موجود',
                $description = ''
            );
        }
    }

    public function decrementQty(int $cartId)
    {
        $CartData = Cart::where('id', $cartId)->where('user_id', \auth()->user()->id)->first();
        if($CartData){
            if($CartData->product->qty > $CartData->qty){
                
                $CartData->decrement('qty');
                // $this->emit('CarAddedUbdated');
                $this->notification()->success(
                $title = '',
                $description = ''
                );
            }
        }else{
            $this->notification()->error(
                $title = 'غير موجود',
                $description = ''
            );
        }
    }

    function deleteCart(int $cartId)
    {
       $cartRemoveItem = Cart::where('user_id', \auth()->user()->id)->where('id',$cartId)->first();
        if($cartRemoveItem){
            $cartRemoveItem->delete();

            $this->emit('CarAddedUbdated');
            $this->notification()->success(
                $title = 'تم حذف المنتج من السلة',
                $description = ''
            );
        }else{
            $this->notification()->error(
                $title = 'حدث خطأ',
                $description = ''
            );
        }
    }
    public function render()
    {
        $this->cart = Cart::where('user_id', \auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-view', [
            'cart' => $this->cart,
        ])->layout('layouts.guest');
    }
}
