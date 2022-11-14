<?php

namespace App\Http\Livewire\Frontend\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class CounOrder extends Component
{
    public $OrderCount;
    protected $listeners = ['OrderAddedUbdated' => 'CountingOrder'];

    public function CountingOrder()
    {
        if(Auth::check()){
            return $this->OrderCount = Cart::where('store_name', \auth()->user()->store_name)->count();
        }else{
            return $this->OrderCount = 0;
        }
    }
    public function render()
    {
        $this->OrderCount = $this->CountingOrder();

        return view('livewire.frontend.order.coun-order', [
            'OrderCount' => $this->OrderCount,
        ]);
    }
}
