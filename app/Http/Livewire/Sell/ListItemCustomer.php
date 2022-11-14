<?php

namespace App\Http\Livewire\Sell;

use Livewire\Component;
use App\Models\Cart;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Auth;

class ListItemCustomer extends Component
{
    use Actions;

    public $order;

    function deleteOrder(int $cartId)
    {
       $cartRemoveItem = Cart::where('store_name', \auth()->user()->store_name)->where('id',$cartId)->first();
        if($cartRemoveItem){
            $cartRemoveItem->delete();

            $this->emit('OrderAddedUbdated');
            $this->notification()->success(
                $title = 'تم حذف الطلب',
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
        $this->order = Cart::where('store_name', \auth()->user()->store_name)->get();

        return view('livewire.sell.list-item-customer', [
            'order' => $this->order,
        ]);
    }
}
