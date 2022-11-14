<?php

namespace App\Http\Livewire\Frontend\Order;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\DB;

class OrderShow extends Component
{
    use Actions;
    public $totalPrice = 0;
     
    
    public $orders, $product;
    public $store_name, $name, $phone_number ,$location_addr;
    protected $rules = [
        'name' => 'required|min:3',
        'store_name' => 'required',
        'phone_number' => 'required',
        'location_addr' => 'required',
    ];

    public function addToCartOrder()
    {
        if(Auth::check())
        {
            if(Cart::where('user_id', \auth()->user()->id)){
                $this->validate();
                
                DB::table('carts')->update([
                    'name' => \auth()->user()->name,
                    'store_name' => $this->store_name,
                    'phone_number' => $this->phone_number,
                    'location_addr' => $this->location_addr,
                ]);
                $this->notification()->success(
                    $title = 'تم تأكيد الطلب ويمطنك استلام بضاعتك.',
                    $description = ''
                );
            }
            else{
                $this->notification()->error(
                    $title = 'please login',
                    $description = ''
                );
            }
        }
    }
    
    public function render()
    {
        $this->name = \auth()->user()->name;
        $this->store_name = \auth()->user()->store_name;

        $this->orders = Cart::where('user_id', \auth()->user()->id)->get();
        
        return view('livewire.frontend.order.order-show', [
            'orders' => $this->orders,
        ])->layout('layouts.guest');
    }
}
