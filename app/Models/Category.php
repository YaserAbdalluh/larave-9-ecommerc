<?php

namespace App\Models;
// use Laravel\Scout\Searchable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // use Searchable;

    // protected $guarded = [];
    
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'image',
    ];

    public function products()
    {
            return $this->hasMany(Product::class, 'cate_id', 'id');
    }
}
