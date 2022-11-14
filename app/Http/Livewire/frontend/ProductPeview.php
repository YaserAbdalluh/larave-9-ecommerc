<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use WireUi\Traits\Actions;

class ProductPeview extends Component
{
    use Actions;

    public $product, $category, $count = 1;
    public $store_name, $name, $phone_number ,$location_addr;

    public function incrementQty()
    {
        if($this->count < 10)
        {
            $this->count+=1;
        }
    }

    public function decrementQty()
    {
        if($this->count > 1)
        {
            $this->count--;
        }
    }

    public function addToCart(int $prodId)
    {
        if(Auth::check())
        {
            // dd($prodId);
            if($this->product->where('id',$prodId)->exists()){
                // dd('99yaser');
                if(Cart::where('user_id', \auth()->user()->id)->where('prod_id', $prodId)->exists()){
                    $this->dialog()->error(
                        $title = 'Error !!!',
                        $description = 'product already exist'
                    );
                }else{
                    if($this->product->qty > 0){
                        if($this->product->qty > $this->count){
                            // insert product to cart
                            Cart::create([
                                'user_id' => \auth()->user()->id,
                                'prod_id' => $prodId,
                                'qty' => $this->count,
                            ]);
                            $this->emit('CarAddedUbdated');
                            $this->notification()->success(
                                $title = 'تم اظافة المنتج الى السلة',
                                $description = ''
                            );
                        }
                        else{
                            $this->notification()->success(
                                $title = 'only qty a'.$this->product->qty.'avaible',
                                $description = ''
                            );
                        }
                    }
                    else{
                        $this->notification()->success(
                            $title = 'qty',
                            $description = ''
                        );
                    }
                }
            }
            else{
                $this->notification()->success(
                    $title = 'product not exist',
                    $description = ''
                );
            }
        }
        else{
            $this->notification()->error(
                $title = 'please login',
                $description = ''
            );
            // $this->dispatchBrowserEvent('message', [
            //     'text' => 'please login',
            //     'type' => 'info',
            //     'status' => 401
            // ]);
        }
    }

    public function mount($id)
    {
        $this->product = Product::where('id', $id)->first();
    }

    public function render()
    {
        return view('livewire.frontend.product-peview')->layout('layouts.guest');
    }

}
