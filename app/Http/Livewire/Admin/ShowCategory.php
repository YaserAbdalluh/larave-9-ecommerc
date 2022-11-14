<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class ShowCategory extends Component
{
    use WithPagination;
    use WithFileUploads;
    use Actions;

    public $search;
    protected $queryString = [
        'search' => ['except' => '', 'as' => 's'],
    ];

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;

    public $name, $slug, $description, $status, $popular, $image;
    public $catId = null;

   public function deleteCat($id):void
   {
        // use a simple syntax: success | error | warning | info
        $this->notification()->success(
            $title = 'حذف الصنف',
            $description = 'تم حذف الصنف.'
        );
       $category = Category::find($id);
    //    Storage::delete('public/categories/', $category->image);
       $category->delete();
   }

    public function createShowModal()
    {
        $this->modalFormVisible = true;
    }
                      
    public function save():void
    {
        $this->validate([
                'name' => 'required|min:3',
                'slug' => 'required',
                'image' => 'required|image|max:1024'
            ]);
            $this->notification()->success(
                $title = 'حفظ الصنف',
                $description = 'تم اظافة الصنف.'
            );
        $image_name = $this->image->getClientOriginalName();
        $this->image->storeAs('public/categories/',$image_name);

        $category = new Category();
        $category->name = $this->name;
        // $category->slug = $this->slug;
        $category->slug = Str::slug($this->name);
        $category->image = $image_name;
        $category->save();
        $this->reset();
    }

    public function editShowModal($id)
    {
        $this->reset();
        $this->modalFormVisible = true;
        $this->catId = $id;
        $this->loadEditForm();
    }

    public function loadEditForm()
    {
        $category = Category::findOrFail($this->catId);
        $this->name = $category->name;
        $this->slug = $category->slug;
    }
 
    public function updateCat()
    {
        
        $this->validate([
            'name' => 'required|min:3',
            'slug' => 'required',
            // 'image' => 'required|image|max:1024',
        ]);
        
        Category::find($this->catId)->update([
            'name' => $this->name,
            'slug' => $this->slug,
            // 'image' => $this->image,
        ]);

        $this->reset();
        $this->notification()->success(
            $title = 'تحرير الصنف',
            $description = 'تم تحرير الصنف.'
        );
    }

    public function render()
    {
        return view('livewire.admin.show-category', [
            'categories' => Category::where('name', 'like', '%'.$this->search.'%')
                         ->orderBy('created_at', 'DESC')->paginate(4),
        ]);
    }
}
