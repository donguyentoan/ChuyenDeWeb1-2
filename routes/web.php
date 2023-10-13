<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LocationController;

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
Route::get('/productList', function () {
    return view('Product.ProductList');
});
Route::get('/auth/login', function () {
    return view('Login.login');
});
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
Route::get('/checkout/receivingIformation' , [CheckoutController::class , 'receivingIformation']);


Route::get('/get-provinces', [LocationController::class, 'getProvinces']);
Route::get('/get-districts/{provinceId}', [LocationController::class, 'getDistrictsByProvince']);
Route::get('/get-wards/{districtId}', [LocationController::class, 'getWardsByDistrict']);


Route::post('/vnpay_create_payment' , [paymentController::class , 'index'] );



Route::get('/OrderDetail', [OrderController::class, 'index']);







