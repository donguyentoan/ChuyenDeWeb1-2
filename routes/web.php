<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SearchProductController;



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
/////home
Route::get('/', [HomeController::class , 'index']);
Route::get('/auth/login', function () { return view('Login.login');});
Route::post('/login',  [LoginController::class , 'login']);
Route::get('/auth/register', function () { return view('Login.register');});
Route::get('/addtocart', function () { return view('addtocart');});
Route::get('/checkout', function () { return view('Checkout'); });
Route::get('/cart' , [CartController::class , 'index']);
Route::get('/checkout/orderForm' , [CheckoutController::class , 'index']);
Route::get('/checkout/orderinfo' , [CheckoutController::class , 'infoOrder']);
Route::get('/checkout/orderinfos' , [CheckoutController::class , 'saveinfoOrder']);
Route::post('/checkout/receivingIformation' , [CheckoutController::class , 'receivingIformation']);
Route::post('/vnpay_create_payment' , [paymentController::class , 'index'] );
Route::get('/OrderDetail', [OrderController::class, 'index']);
Route::get('/update-status', [AdminController::class, 'updateStatus']);
Route::get('/update-huy', [AdminController::class, 'updateStatushuy']);
Route::get('/filter',  [FilterController::class , 'getManufacture']);
Route::get('/products',  [ProductController::class , 'index']);
Route::get('/products/filter', [ProductController::class , 'filter']);
Route::get('/searchProduct', [SearchProductController::class , 'Result_Search']);
/// API 
Route::get('/get-provinces', [LocationController::class, 'getProvinces']);
Route::get('/get-districts/{provinceId}', [LocationController::class, 'getDistrictsByProvince']);
Route::get('/get-wards/{districtId}', [LocationController::class, 'getWardsByDistrict']);
// Admin
Route::get('/dashboard', [AdminController::class , 'index'] );
Route::get('/productList', [AdminController::class , 'showProductList'] );
Route::get('/orderCustomer', [AdminController::class , 'showOrder'] );
Route::get('/AddProduct', [AdminController::class , 'addProduct'] );
Route::post('/uploads', [AdminController::class, 'uploadImageProduct']);
Route::get('/EditProduct/{id}', [AdminController::class , 'EditProduct'] );
Route::delete('/products/{product}', 'ProductController@destroy');






Route::post('/filter-products', 'ProductController@filterProducts');

















