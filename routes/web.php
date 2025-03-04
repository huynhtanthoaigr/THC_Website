<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CarImageController;
use App\Http\Controllers\Admin\CarDetailController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\CheckoutController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('user/home');
})->name('home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('user.home');
    })->name('home')->middleware('role:user');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard')->middleware('role:admin');
});
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class);
});
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('brands', BrandController::class)->except(['show', 'create', 'edit']);
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('cars', CarController::class);
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('car_images', CarImageController::class)->names('admin.car_images');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('car_details', CarDetailController::class);
});

Route::get('/shop', [ShopController::class, 'index'])->name('user.shop.index');
Route::get('/car/{id}', [ShopController::class, 'show'])->name('user.shop.show');

use App\Http\Controllers\User\CartController;
Route::post('/cart/add/{id}', [\App\Http\Controllers\User\CartController::class, 'add'])->name('cart.add');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/coupon', [CartController::class, 'coupon'])->name('cart.coupon');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
