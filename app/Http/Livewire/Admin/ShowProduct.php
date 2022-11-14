<?php

namespace App\Http\Livewire\Admin;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use Livewire\Component;

class ShowProduct extends Component
{
    use Actions;
    use WithFileUploads;

    
    public $name, $slug, $description, $original_price, $cate_id, $selling_price, $qty, $photo ;
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
    ];

    protected $messages = [
        'name.required' => 'مطلوب ملئ حقل الاسم.',
        'description.required' => 'The Email Address format is not valid.',
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

    // public function like():void
    // {
        
    // }
    
        
    public function render()
    {
        // return view('livewire.admin.show-product');

        return view('livewire.admin.show-product', [
                'categories'=> Category::all(),  
            ]);

        // return view('livewire.admin.show-product', [
        //     'products' => $this->readyToLoad
        //     ?Product::all()
        //     :[],
        // ]);
    }
}
