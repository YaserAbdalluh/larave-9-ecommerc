<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

class ShowCategoryComponent extends Component
{
    public $product;
    public $category;

    public function render()
    {
        return view('livewire.frontend.show-category-component', [
            'categories' => Category::all(),
        ]);
    }
}
