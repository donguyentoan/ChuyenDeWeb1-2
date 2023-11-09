<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LocationController;
<<<<<<< HEAD
use App\Http\Controllers\SearchProductController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ManufacturesController;
=======
use App\Http\Controllers\LoginController;



>>>>>>> f7caa68561d676bfdc04a160c9b0d2b2bb9df1c5

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

Route::get('/', [HomeController::class , 'index']);
Route::get('/dashboard', [AdminController::class , 'index'] );
Route::get('/productList', [AdminController::class , 'showProductList'] );
Route::get('/orderCustomer', [AdminController::class , 'showOrder'] );


Route::get('/auth/login', [LoginController::class , 'index']);
Route::post('/login' , [LoginController::class , 'login'] )->name('login');
// forget
Route::get('/forgot-password', [LoginController::class , 'indexforgot']);

// Login with gg
Route::get('auth/google',  [LoginController::class ,'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback',  [LoginController::class ,'handleGoogleCallback']);

// // Handle the password reset request
Route::post('/forgot-password', [LoginController::class,'sendResetLinkEmail'])->name('password.email');

// Display the password reset form
Route::get('/reset-password/{token}',  [LoginController::class,'showResetForm'])->name('password.reset');

// Handle the password reset form submission
Route::post('/reset-password',  [LoginController::class,'reset'])->name('password.update');



// Love
// Route::get('/love-items', [LoveItemController::class, 'index'])->name('love-items.index');
// Route::post('/love-items', [LoveItemController::class, 'store'])->name('love-items.store');
// Route::delete('/love-items/{loveItem}', [LoveItemController::class, 'destroy'])->name('love-items.destroy');



Route::get('/auth/register', function () {
    return view('Login.register');
});

Route::get('/addtocart', function () {
    return view('addtocart');
});

Route::get('/checkout', function () {
    return view('Checkout');
});


Route::get('/mini', function () {
    return view('Component.test');
});


Route::post('/add-to-cart', [CartController::class , 'addtocart']);



Route::get('/delItemCart/{$id}', [CartController::class , 'deleteItemCart']);





Route::post('/add-to-cart/{product}', 'CartController@addToCart')->name('cart.add');

Route::get('/get-cart-data', 'CartController@getCartData')->name('cart.get-data');
Route::get('/delete/{$id}' , [CartController::class , 'removeFromCart']);
Route::get('/cart' , [CartController::class , 'index']);
Route::get('/checkout/orderForm' , [CheckoutController::class , 'index']);

Route::get('/checkout/orderinfo' , [CheckoutController::class , 'infoOrder']);
Route::get('/checkout/orderinfos' , [CheckoutController::class , 'saveinfoOrder']);
Route::post('/checkout/receivingIformation' , [CheckoutController::class , 'receivingIformation']);


Route::get('/get-provinces', [LocationController::class, 'getProvinces']);
Route::get('/get-districts/{provinceId}', [LocationController::class, 'getDistrictsByProvince']);
Route::get('/get-wards/{districtId}', [LocationController::class, 'getWardsByDistrict']);

Route::get('/dashboard', [AdminController::class , 'index'] );
Route::get('/orderCustomer', [AdminController::class , 'showOrder'] );

<<<<<<< HEAD
// Admin
    //product
Route::get('/productList', [ProductController::class , 'index'] );
Route::get('/AddProduct', [ProductController::class , 'create'] );
Route::post('/uploads', [ProductController::class, 'store']);
Route::get('/EditProduct/{id}', [ProductController::class , 'edit'] );
Route::post('/updateProduct/{id}', [ProductController::class, 'update']);
Route::delete('/deleteProduct/{id}', [ProductController::class, 'destroy']);
    
    //categories
Route::get('/showCategories', [CategoriesController::class , 'index'] );
Route::post('/addCategories', [CategoriesController::class, 'store']);
Route::delete('/deleteCategorie/{id}', [CategoriesController::class, 'destroy']);
Route::get('/editCategories/{id}', [CategoriesController::class , 'edit'] );
Route::post('/updateCategories/{id}', [CategoriesController::class, 'update']);

    //manufacture
Route::get('/showManufactures', [ManufacturesController::class , 'index'] );
Route::post('/addManufacture', [ManufacturesController::class, 'store']);
Route::delete('/deleteManufacture/{id}', [ManufacturesController::class, 'destroy']);
Route::get('/editManufacture/{id}', [ManufacturesController::class , 'edit'] );
Route::post('/updateManufacture/{id}', [ManufacturesController::class, 'update']);

    //user

Route::post('/filter-products', 'ProductController@filterProducts');
=======
Route::post('/vnpay_create_payment' , [paymentController::class , 'index'] );
Route::get('/OrderDetail', [OrderController::class, 'index']);

Route::get('/update-status', [AdminController::class, 'updateStatus']);
Route::get('/update-huy', [AdminController::class, 'updateStatushuy']);
>>>>>>> f7caa68561d676bfdc04a160c9b0d2b2bb9df1c5

Route::get('/filter',  [FilterController::class , 'getManufacture']);

Route::get('/products',  [ProductController::class , 'index']);
Route::get('/products/filter', [ProductController::class , 'filter']);















