<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;
    use Notifiable;

    protected  $guard = ['customer'];
    protected $fillable = [
        'Fist_name',
        'Last_name',
        'phone_number',
        'card_number',
        'email',
        'store_name',
        'location',
        'product_type',
        'password',
    ];
}
