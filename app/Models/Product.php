<?php

namespace App\Models;
// use Laravel\Scout\Searchable;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // use Searchable;
    
    protected $table = 'products';
    protected $fillable = [
        'cate_id',
        'user_id',
        'name',
        'slug',
        'description',
        'original_price',
        'selling_price',
        'photo',
        'photo1',
        'photo2',
        'photo3',
        'photo4',
        'photo5',
        'qty',
        'status',
        'phone',
        'store_name',
        'location',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');      // relationship
    }
}
