<?php

namespace App\Http\Livewire\CustomerSell;

use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class CustomerComponent extends Component
{
    public $currentStep = 1;
    public $phone, $store_name, $location, $product_type, $prod_id;
    public $successMsg = '';

    // public $redirectTo = RouteServiceProvider::HOME;


    public function render()
    {
        return view('livewire.customer-sell.customer-component')->layout('layouts.guest');
    }


    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'phone' => 'required|numeric',
            'location' => 'required',
            'store_name' => 'required',
            'product_type' => 'required',
        ]);
        $this->currentStep = 2;
    }

    public function submitForm()
    {
       auth()->user()->update([
            'phone' => $this->phone,
            'location' => $this->location,
            'store_name' => $this->store_name,
            'product_type' => $this->product_type,
        ]);

        // $this->currentStep = 2;
        // $this->clearForm();
        // auth()->user($customer);
        $this->successMsg = 'Team successfully created.';
  
        // return redirect()->route('seller.list-item');
        return redirect('seller/list-item-seller');
  
    }

    public function back($step)
    {
        $this->currentStep = $step;    
    }

    public function clearForm()
    {
        $this->phone = '';
        $this->location = '';
        $this->store_name = '';
        $this->product_type = '';
    }
}
