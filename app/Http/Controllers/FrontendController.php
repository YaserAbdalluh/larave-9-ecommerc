<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // public function categories()
    // {
    //     $categories = Category::all();
    //     return \view('livewire.frontend.show-category-component', \compact('categories'));
    // }
    public function index()
    {
        return \view('welcome');
    }
    public function producFech($id)
    {
        $category = Category::where('id',$id)->first();
        
        if($category){
            $products = $category->products()->get();       // relationship
            return \view('livewire.frontend.show-prduct-component',\compact('products','category'))->layout('layouts.guest');;
        }
        else{
            return \redirect()->back();
        }
    }

    public function viewproduct($cate_slug, $prod_slug)
    {
        if(Category::where('slug',$cate_slug)->exists())
        {
            if(Product::where('slug',$prod_slug)->exists())
            {
                $products = Product::where('slug',$prod_slug)->first();
                
                return view('livewire.frontend.product-peview',compact('products'));
            
            }
        }
    }
}
