<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GoogleController;
use App\Http\Controllers\Admin\PosterController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AdminDashboard\homeController;

use App\Http\Controllers\User\UserAuthController;
use App\Http\Controllers\UserDashboard\userDashboardController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;




Route::get('/',[WelcomeController::class,'welcome'])->name('welcome');
Route::get('about',[WelcomeController::class,'about'])->name('about');
Route::get('products',[WelcomeController::class, 'products'])->name('products');
Route::get('contact',[WelcomeController::class, 'contact'])->name('contact');
Route::get('singleproduct/{id}',[WelcomeController::class, 'singleproduct'])->name('single.product');
Route::post('/favourite/add/{id}', [WelcomeController::class, 'addToFavourite'])->name('favourite.add');
Route::post('/favourite/remove/{id}', [WelcomeController::class, 'removeFromFavourite'])->name('favourite.remove');
Route::get('/favourite/list', [WelcomeController::class, 'favouriteList'])->name('favourite.list');



Route::post('/cart/add/{id}', [WelcomeController::class, 'addToCart']);
Route::get('/cart/data', [WelcomeController::class, 'getCartData']);
Route::post('/cart/remove/{id}', [WelcomeController::class, 'removeFromCart']);
Route::post('/cart/update/{id}', [WelcomeController::class, 'updateCartQty']);






Route::prefix('admin')->name('admin.')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Guest Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('guest:admin')->group(function () {

        Route::get('register/adminpanel', [AuthController::class, 'showRegister'])
            ->name('register');

        Route::post('register', [AuthController::class, 'register']);

        Route::get('login/adminpanel', [AuthController::class, 'showLogin'])
            ->name('adminlogin');

        Route::post('login/adminpanel/insert', [AuthController::class, 'login']) ->name('login.foradmin');;

        Route::get('auth/google', [GoogleController::class, 'redirect'])
            ->name('google');

        Route::get('auth/google/callback', [GoogleController::class, 'callback']);
    });


    /*
    |--------------------------------------------------------------------------
    | Password Reset (No Middleware)
    |--------------------------------------------------------------------------
    */
    Route::get('forgot-password', [AuthController::class, 'showForgotForm'])
        ->name('password.request');

    Route::post('forgot-password', [AuthController::class, 'sendResetCode'])
        ->name('password.email');

    Route::get('reset-password', [AuthController::class, 'showResetForm'])
        ->name('password.reset');

    Route::post('reset-password', [AuthController::class, 'resetPassword'])
        ->name('password.update');


    /*
    |--------------------------------------------------------------------------
    | Authenticated Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('auth:admin')->group(function () {

        Route::get('dashboard', [homeController::class, 'MainDashboard'])
            ->name('dashboard');

        Route::get('profile', [AuthController::class, 'profile'])
            ->name('profile');

        Route::post('logout', [AuthController::class, 'logout'])
            ->name('logout');

        Route::resource('categories', CategoryController::class)
            ->names('categories');

        Route::resource('attributes', AttributeController::class)
            ->names('attributes');

        Route::resource('products', ProductController::class)
            ->names('products');
            Route::resource('posters', PosterController::class)
    ->names('posters');


            Route::resource('users', \App\Http\Controllers\Admin\UserController::class)
    ->names('users');
    });

});




// User ROute

Route::middleware('guest')->group(function () {
Route::get('/User/register', [UserAuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [UserAuthController::class, 'register'])->name('register');

Route::get('/user/login', [UserAuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [UserAuthController::class, 'login'])->name('login.user');
});
Route::get('/verify', [UserAuthController::class, 'showVerify'])->name('verify.form');
Route::post('/verify', [UserAuthController::class, 'verify'])->name('verify');

Route::post('/resend-code', [UserAuthController::class, 'resendCode'])->name('resend.code');

Route::post('/user/logout', [UserAuthController::class, 'logout'])->name('logout');

// Forgot Password
Route::get('/forgot-password', [UserAuthController::class, 'showForgotForm'])->name('forgot.form');
Route::post('/send-reset-code', [UserAuthController::class, 'sendResetCode'])->name('send.reset.code');

// Reset Password
Route::get('/reset-password', [UserAuthController::class, 'showResetForm'])->name('reset.form');
Route::post('/reset-password', [UserAuthController::class, 'resetPassword'])->name('reset.password');



Route::middleware(['auth'])->group(function () {

    Route::get('/userdashboard', [userDashboardController::class, 'index'])
        ->name('dashboard');

    //      Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    //      Route::get('/cart/count', [CartController::class,'count'])->name('cart.count');
    // Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    // Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    // Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

});