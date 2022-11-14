<?php

namespace App\Http\Livewire\Sell;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Auth;


use Livewire\Component;

class CustomerProduct extends Component
{
    use Actions;
    use WithFileUploads;

    
    public $name, $slug, $description, $original_price, 
           $cate_id,$user_id, $selling_price, $qty, $photo,
           $phone, $store_name, $location ;
    public $photo1, $photo2, $photo3, $photo4, $photo5;

    protected $rules = [
        'name' => 'required|min:3',
		// 'slug' => 'required|unique:products',
        'description' => 'required',
        'original_price' => 'required',
        'selling_price' => 'required',
        'qty' => 'required',
        'cate_id' => 'required',
        'photo' => 'required|image|max:1024',
        'photo1' => 'required|image|max:1024',
        'photo2' => 'required|image|max:1024',
        'photo3' => 'required|image|max:1024',
        'photo4' => 'required|image|max:1024',
        'photo5' => 'required|image|max:1024',
        'phone' => 'required',
        'store_name' => 'required',
        'location' => 'required',
    ];

    protected $messages = [
        'name.required' => 'مطلوب ملئ حقل الاسم.',
        'cate_id.required' => 'حدد نوع المنتج(القسم).',
        'description.required' => 'أملئ حقل الوصف.',
        'original_price.required' => 'أملئ حقل السعر بدون خصم.',
        'selling_price.required' => 'أملئ حقل سعر المنتج مع الخصم.',
        'qty.required' => 'أملئ حقل الكمية.',
        'photo.required' => 'حقل الصوره مطلوب.',
        'photo1.required' => 'أضف صورة ثاني.',
        'photo2.required' => 'اضف صورة ثالثة.',
    ];

    protected $validationAttributes = [
        'name' => 'email address'
    ];

    public function submit()
    {
        $this->validate();
        
        $product = new Product();
        
        $img_name=$this->photo->getClientOriginalName();
        $this->photo->storeAs('public/products/',$img_name);

        $image1=$this->photo1->getClientOriginalName();
        $this->photo1->storeAs('public/images/image1/',$image1);
        $image2=$this->photo2->getClientOriginalName();
        $this->photo2->storeAs('public/images/image2/',$image2);
        $image3=$this->photo3->getClientOriginalName();
        $this->photo3->storeAs('public/images/image3/',$image3);
        $image4=$this->photo4->getClientOriginalName();
        $this->photo4->storeAs('public/images/image4/',$image4);
        $image5=$this->photo5->getClientOriginalName();
        $this->photo5->storeAs('public/images/image5/',$image5);
        
        $product->name =$this->name;
        $product->cate_id =$this->cate_id;
        $product->user_id = \auth()->user()->id;
        
        $product->phone = \auth()->user()->phone;
        $product->store_name = \auth()->user()->store_name;
        $product->location = \auth()->user()->location;
        
        $product->description =$this->description;
        $product->original_price =$this->original_price;
        $product->selling_price =$this->selling_price;
        $product->qty =$this->qty;
        
        $product->photo = $img_name;
        $product->photo1 = $image1;
        $product->photo2 = $image2;
        $product->photo3 = $image3;
        $product->photo4 = $image4;
        $product->photo5 = $image5;

        $product->save();
        $this->reset();
    }
    public function render()
    { 
        $this->phone = \auth()->user()->phone;
        $this->store_name = \auth()->user()->store_name;
        $this->location = \auth()->user()->location;

        return view('livewire.sell.customer-product', [
            'categories'=> Category::all(),  
        ])->layout('layouts.frontpage');
    }
}
