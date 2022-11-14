<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\CKEditorController;
use App\Http\Livewire\Frontend\ShowPrductComponent;
use App\Http\Livewire\Frontend\ProductPeview;
use App\Http\Livewire\Sell\CustomerListItem;
use App\Http\Livewire\Profile\Show;
use App\Http\Livewire\CustomerSell\CustomerComponent;
use App\Http\Livewire\CustomerSell\CustomerLogin;

use App\Models\Product;
// use App\Http\Controllers\Cart\CartController;
use App\Http\Livewire\Frontend\Cart\CartView;
use App\Http\Livewire\Frontend\Order\OrderShow;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class,'index'])->name('welcome');


Route::get('/products/{id}', [FrontendController::class,'producFech']);
Route::get('/product-overview/{id}', ProductPeview::class);

Route::middleware('auth')->group(function () {
    Route::get('/shopping-cart',CartView::class)->name('shopping-cart');
    Route::get('order/order-product',OrderShow::class)->name('order-product');
    Route::get('/user-profile', Show::class);

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/category', function () {
        return view('admin.category');
    })->name('category');
    Route::get('/product', function () {
        return view('admin.product');
    })->name('product');
    Route::get('/list-item', function () {
        return view('admin.list-item');
    })->name('list-item');
});

Route::group([
    'middleware' => ['auth','verified'],
    'prefix' => 'seller'
    ], 
    function () {
        Route::group([
            'middleware' => ['seller']
            ], 
            function () {
                Route::get('/list-item-seller', function () {
                    return view('seller.list-item');
                });
                Route::post('/ckeditor/upload', [CKEditorController::class,'upload'])->name('ckeditor.image-upload');
                Route::get('/list-item-customer', function () {
                    return view('seller.list-item-customer');
                });
                Route::get('/user-profile', Show::class);
                Route::get('/product', function () {
                    return view('seller.product');
            });
        });
    // Route::get('/customer-login', CustomerLogin::class);
    Route::get('/customer-register', CustomerComponent ::class);
});

/**
 * Authentication
 */

Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [LoginController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [LoginController::class, 'callbackFromFacebook'])->name('callback');
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


Route::get('search', function() {
    $query = ''; // <-- Change the query for testing.

    $articles = App\Models\Product::search($query)->get();

    return $articles;
});
