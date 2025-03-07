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
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\ProfileController;
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



Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index'); // Hồ sơ User
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit'); // Chỉnh sửa hồ sơ User
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Cập nhật hồ sơ User

    // Admin
    Route::get('/admin/profile', [ProfileController::class, 'adminProfile'])->name('admin.profile'); // Hồ sơ Admin
    Route::get('/admin/profile/edit', [ProfileController::class, 'editAdmin'])->name('profile.edit.admin'); // Chỉnh sửa hồ sơ Admin
    Route::put('/admin/profile', [ProfileController::class, 'updateAdmin'])->name('admin.profile.update'); // Cập nhật hồ sơ Admin
    Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('password.update');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/company', [CompanyProfileController::class, 'index'])->name('admin.company.index');
    Route::get('/company/edit', [CompanyProfileController::class, 'edit'])->name('admin.company.edit');
    Route::post('/company/update', [CompanyProfileController::class, 'update'])->name('admin.company.update');
});
use App\Http\Controllers\Admin\AdminOrderController;

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
    Route::post('/orders/{id}/update-status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
});
use App\Http\Controllers\User\OrderController;

Route::middleware(['auth', 'verified'])->prefix('user')->name('user.')->group(function() {
    // Route để hiển thị danh sách đơn hàng
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    
    // Route để hiển thị chi tiết đơn hàng
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});
use App\Http\Controllers\User\FavoriteController;



Route::middleware(['auth'])->group(function () {
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('user.favorites.index');
    Route::post('/favorites/{car}', [FavoriteController::class, 'store'])->name('user.favorites.store');
    Route::delete('/favorites/{car}', [FavoriteController::class, 'destroy'])->name('user.favorites.destroy');
});
use App\Http\Controllers\Admin\BlogCategoryController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('blog_categories', BlogCategoryController::class);
});

use App\Http\Controllers\Admin\BlogController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('blogs', BlogController::class);
});
