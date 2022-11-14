<?php

namespace App\Http\Livewire\CustomerSell;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException; 
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CustomerLogin extends Component
{

    public function render()
    {
        return view('livewire.customer-sell.customer-login')->layout('layouts.guest');
    }
}
