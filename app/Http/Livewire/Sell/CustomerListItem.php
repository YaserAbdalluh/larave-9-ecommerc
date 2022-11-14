<?php

namespace App\Http\Livewire\Sell;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use WireUi\Traits\Actions;


class CustomerListItem extends Component
{
    use WithPagination;
    use Actions;

    public $product, $prod_id = null;
    public $image;

    public $name, $slug, $description, $original_price, 
           $cate_id,$user_id, $selling_price, $qty, $photo,
           $phone, $store_name, $location ;

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;

    public $contentIsVisible = false;

    public $search = '';
    protected $queryString = [
            'search' => ['except' => '', 'as' => 's'],
            'page' => ['except' => 1, 'as' => 'p'],
    ];

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required',
        'original_price' => 'required',
        'selling_price' => 'required',
        'qty' => 'required',
        'cate_id' => 'required',
        // 'location' => 'required',
        // 'phone' => 'required',
        // 'photo' => 'required|image|max:1024',
        // 'photo1' => 'required|image|max:1024',
        // 'photo2' => 'required|image|max:1024',
        // 'photo3' => 'required|image|max:1024',
        // 'photo4' => 'required|image|max:1024',
        // 'photo5' => 'required|image|max:1024',
        // 
        // 
        
    ];

    protected $messages = [
        'name.required' => 'مطلوب ملئ حقل الاسم.',
        'cate_id.required' => 'حدد نوع المنتج(القسم).',
        'description.required' => 'أملئ حقل الوصف.',
        'original_price.required' => 'أملئ حقل السعر بدون خصم.',
        'selling_price.required' => 'أملئ حقل سعر المنتج مع الخصم.',
        'qty.required' => 'أملئ حقل الكمية.',
        // 'photo.required' => 'حقل الصوره مطلوب.',
        // 'photo1.required' => 'أضف صورة ثاني.',
        // 'photo2.required' => 'اضف صورة ثالثة.',
    ];

    public function deleteItem($id):void
   {
        // use a simple syntax: success | error | warning | info
        $this->notification()->success(
            $title = 'حذف الصنف',
            $description = 'تم حذف الصنف.'
        );
       $product = Product::find($id);
    //    Storage::delete('public/products/', $product->image);
       $product->delete();
   }

    // edite modal

    public function editShowModal($id)
    {
        $this->reset();
        $this->modalFormVisible = true;
        $this->prod_id = $id;
        $this->loadEditForm();
    }

    public function loadEditForm()
    {
        $product = Product::findOrFail($this->prod_id);
        $this->name = $product->name;

        $this->cate_id = $product->cate_id;
        \auth()->user()->id = $product->user_id;
        \auth()->user()->phone = $product->phone;
        // \auth()->user()->store_name = $product->store_name;
        \auth()->user()->location = $product->location;
        $this->description = $product->description;
        $this->original_price = $product->original_price;
        $this->selling_price = $product->selling_price;
        $this->qty = $product->qty;
    }
    
    public function updateProduct()
    {
        $this->validate();
        
        Product::find($this->prod_id)->update([
            'cate_id' => $this->cate_id,
            'name' => $this->name,
            'description' => $this->description,
            'qty' => $this->qty,
            'original_price' => $this->original_price,
            'selling_price' => $this->selling_price,
        ]);

        $this->reset();
        $this->notification()->success(
            $title = 'تحرير المنتج',
            $description = 'تم تحرير المنتج.'
        );
    }

    public function render()
    {
        $this->phone = \auth()->user()->phone;
        $this->location = \auth()->user()->location;

        $this->product = Product::where('user_id', \auth()->user()->id)->get();

        return view('livewire.sell.customer-list-item', [
            'product' => $this->product,
            'categories' => Category::All(),
        ])->layout('layouts.frontpage');
    }
}
