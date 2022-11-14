<?php

namespace App\Http\Livewire\Frontend\Cart;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class CartCount extends Component
{
    public $CartCount;
    protected $listeners = ['CarAddedUbdated' => 'CountingCart'];

    public function CountingCart()
    {
        if(Auth::check()){
            return $this->CartCount = Cart::where('user_id', \auth()->user()->id)->count();
        }else{
            return $this->CartCount = 0;
        }
    }

    public function render()
    {
        $this->CartCount = $this->CountingCart();
        return view('livewire.frontend.cart.cart-count', [
            'CartCount' => $this->CartCount,
        ]);
    }
}
