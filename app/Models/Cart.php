<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = "carts";

    protected $fillable = [
        'user_id',
        'prod_id',
        'qty',
        'name',
        'phone_number',
        'store_name',
        'location_addr',
    ];

    /**
     * Get the product that owns the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'prod_id', 'id');
    }

    // public function productColor(): BelongsTo
    // {
    //     return $this->belongsTo(ProductColor::class, 'prod_color_id', 'id');
    // }
}
