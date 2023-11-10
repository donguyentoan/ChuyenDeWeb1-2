<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\NewPostController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RegisterController;
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
Route::post('/register' , [RegisterController::class, 'register']);
Route::get('/newpost', [NewPostController::class , 'index']);
Route::get('/detailPost/{id}', [NewPostController::class, 'detailPost']);
///////


Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact_cus',  [ContactController::class , 'contact_cus']);



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
    //product
Route::get('/dashboard', [AdminController::class , 'index'] );
Route::get('/productList', [AdminController::class , 'showProductList'] );
Route::get('/orderCustomer', [AdminController::class , 'showOrder'] );
Route::get('/AddProduct', [AdminController::class , 'addProduct'] );
Route::post('/uploads', [AdminController::class, 'uploadImageProduct']);
Route::get('/EditProduct/{id}', [AdminController::class , 'EditProduct'] );
Route::delete('/deleteProduct/{id}', [AdminController::class, 'destroyProduct']);
Route::post('/updateProduct/{id}', [AdminController::class, 'updateProduct']);
    
    //categories
Route::get('/showCategories', [AdminController::class , 'showCategories'] );
Route::post('/addCategories', [AdminController::class, 'addCategories']);
Route::delete('/deleteCategorie/{id}', [AdminController::class, 'destroyCategorie']);
Route::get('/editCategories/{id}', [AdminController::class , 'editCategories'] );
Route::post('/updateCategories/{id}', [AdminController::class, 'updateCategories']);

    //manufacture
Route::get('/showManufactures', [AdminController::class , 'showManufactures'] );
Route::post('/addManufacture', [AdminController::class, 'addManufacture']);
Route::delete('/deleteManufacture/{id}', [AdminController::class, 'destroyManufacture']);
Route::get('/editManufacture/{id}', [AdminController::class , 'editManufacture'] );
Route::post('/updateManufacture/{id}', [AdminController::class, 'updateManufacture']);

    //user

Route::post('/filter-products', 'ProductController@filterProducts');

















