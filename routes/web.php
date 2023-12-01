<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TopupController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewPostController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ManufacturesController;
use App\Http\Controllers\InforCustomerController;
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
    //Home
    Route::get('/', [HomeController::class , 'index'])->name('home');

    // login, register
    Route::get('/auth/login', [LoginController::class , 'index']);
    Route::post('/login',  [LoginController::class , 'login']);
    Route::post('/logout' , [LoginController::class , 'logout'])->name('logout');
    Route::get('/auth/register', [LoginController::class , 'indexRegister']);
    Route::post('/register' , [RegisterController::class, 'register']);
    Route::get('/newpost', [NewPostController::class , 'index']);
    Route::get('/detailPost/{id}', [NewPostController::class, 'detailPost']);

// Login with gg
Route::get('auth/google',  [LoginController::class ,'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback',  [LoginController::class ,'handleGoogleCallback']);
Route::get('forget-password', [ForgotController::class, 'showForgetPasswordForm'])->name('forget.password.get');

//fotgot password
Route::post('forget-password', [ForgotController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//contact
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact_cus',  [ContactController::class , 'contact_cus']);

// add to cart
Route::post('/add-to-cart/{product}', 'CartController@addToCart')->name('cart.add');
Route::get('/get-cart-data', 'CartController@getCartData')->name('cart.get-data');
Route::get('/delete/{$id}' , [CartController::class , 'removeFromCart']);
Route::get('/cart' , [CartController::class , 'index']);

//checkout
Route::get('/checkout/orderForm' , [CheckoutController::class , 'index']);
Route::get('/checkout/orderinfo' , [CheckoutController::class , 'infoOrder']);
Route::get('/checkout/orderinfos' , [CheckoutController::class , 'saveinfoOrder']);
Route::post('/checkout/receivingIformation' , [CheckoutController::class , 'receivingIformation']);

//location
Route::get('/get-provinces', [LocationController::class, 'getProvinces']);
Route::get('/get-districts/{provinceId}', [LocationController::class, 'getDistrictsByProvince']);
Route::get('/get-wards/{districtId}', [LocationController::class, 'getWardsByDistrict']);

// Admin-------------------------------------------------------------------------------------

//dashboard
Route::get('/dashboard', [SaleController::class , 'index'] )->name('dashboard');




Route::group(['middleware' => 'role:1,2'], function () {
        //product
    Route::get('/products',  [ProductController::class , 'index']);
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

        //order 
    Route::get('/update-status', [AdminController::class, 'updateStatus']);
    Route::get('/update-huy', [AdminController::class, 'updateStatushuy']);
    Route::get('/orderCustomer', [AdminController::class , 'showOrder'] )->name('order.list');

        //Banners
    Route::get('/bannerList', [BannersController::class , 'index'] );
    Route::post('/addBanners', [BannersController::class, 'store']);
    Route::delete('/deleteBanners/{id}', [BannersController::class, 'destroy']);
    Route::get('/editBanners/{id}', [BannersController::class , 'edit'] );
    Route::post('/updateBanners/{id}', [BannersController::class, 'update']);

});

//super amdin role 1 truy cập all
Route::group(['middleware' => 'role:1'], function () {
    // Route::get('/dashboard', [SaleController::class, 'index'])->name('dashboard');

    //user
    Route::get('/showUser', [UserController::class, 'index']);
    Route::delete('/deleteUser/{id}', [UserController::class, 'destroy']);
    Route::get('/editUser/{id}', [UserController::class, 'edit']);
    Route::post('/updateUser/{id}', [UserController::class, 'update']);

});

// -----------------Thanh Toán---------------------
    //thanh toan vn pay
Route::post('/filter-products', 'ProductController@filterProducts');
Route::post('/vnpay_create_payment' , [paymentController::class , 'index'] );
Route::get('/vnpay_return' , [paymentController::class , 'vnpay_return'] );

Route::post('/vnpay_create_payment' , [TopupController::class , 'index1'] );
Route::get('/vnpay_return' , [TopupController::class , 'vnpay_return'] );

    //payment
Route::get('/saveInForPay', [paymentController::class, 'save']);
Route::get('/ShowPayment', [paymentController::class, 'showpayment']);

// -----------------End Thanh Toán---------------------

    //order
Route::get('/OrderDetail', [OrderController::class, 'index']);

    //search product
    //filter
Route::get('/filter',  [FilterController::class , 'getManufacture']);
Route::get('/filter', [FilterController::class, 'filter'])->name('filter');
Route::get('/products/filter', [ProductController::class , 'filter']);
Route::get('/searchProduct', [SearchProductController::class , 'Result_Search']);
Route::get('/searchProductDashboard', [SearchProductController::class , 'Result_Search_Dashboard']);
Route::get('/searchOrder', [SearchProductController::class , 'Result_Search_OrderCustomer']);

    //Like product
Route::post('/like/{id}', [LikeController::class, 'like']);
Route::get('/check-like/{id}', [LikeController::class, 'checkLikeStatus']);

    
Route::get('/categories/{id}', [ProductController::class, 'indexByCategory']);


Route::get('/sale' , [SaleController::class , 'index'] );


Route::get('/inforCustomer', [InforCustomerController::class, 'index']);
Route::get('/customerAddress', [InforCustomerController::class, 'showaddress']);
Route::get('/orderHistory', [InforCustomerController::class, 'orderHistory']);
Route::get('/customerChangepassword', [InforCustomerController::class, 'customerChangepassword']);
Route::post('/changepassword', [UserController::class, 'customerChangepassword']);
Route::post('/saveAddress', [InforCustomerController::class, 'saveaddress']);
Route::get('/detailOrder', [InforCustomerController::class, 'index1']);


Route::post('/order/delete/{id}', [OrderController::class, 'deleteOrder']);


Route::get('/topup', [TopupController::class, 'index']);
Route::get('/savetopup ', [TopupController::class, 'wallet_transaction']);



    Route::get('/showManufactures', [ManufacturesController::class , 'index'] );
    Route::get('/ManufactureAdd', [ManufacturesController::class , 'create'] );


    Route::post('/uploads', [ManufacturesController::class, 'store']);
    Route::delete('/deleteManufacture/{id}', [ManufacturesController::class, 'destroy']);
    Route::get('/editManufacture/{id}', [ManufacturesController::class , 'edit'] );
    Route::post('/updateManufacture/{id}', [ManufacturesController::class, 'update']);







