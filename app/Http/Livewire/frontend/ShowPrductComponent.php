<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use \Illuminate\Session\SessionManager;

class ShowPrductComponent extends Component
{
    public $product;
    
    public function mount($id)
    {
        $this->product = Product::where('id', $id)->first();
    }
    
    public function render()
    { 
        return view('livewire.frontend.show-prduct-component')->layout('layouts.guest');
    }

}
