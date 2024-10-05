<?php

use App\Http\Controllers\Admin\VendorController as AdminVendorController;
use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\VendorAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;

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
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::get('vendors', [AdminVendorController::class, 'index'])->name('admin.vendors');
    Route::post('vendors/{id}/approve', [AdminVendorController::class, 'approve'])->name('admin.vendors.approve');
});

Route::get('/vendor/register', [VendorAuthController::class, 'showRegistrationForm'])->name('vendor.register');
Route::post('/vendor/register', [VendorAuthController::class, 'register'])->name('vendor.register.submit');
Route::get('/vendor/login', [VendorAuthController::class, 'showLoginForm'])->name('vendor.login');
Route::post('/vendor/login', [VendorAuthController::class, 'login'])->name('vendor.login.submit');
Route::post('/vendor/logout', [VendorAuthController::class, 'logout'])->name('vendor.logout');

Route::middleware(['auth:vendor'])->group(function () {
    Route::resource('vendor/products', ProductController::class)->names([
        'index' => 'vendor.products.index',
        'create' => 'vendor.products.create',
        'store' => 'vendor.products.store',
        'show' => 'vendor.products.show',
        'edit' => 'vendor.products.edit',
        'update' => 'vendor.products.update',
        'destroy' => 'vendor.products.destroy',
    ]);
});

Route::get('/products', [BuyerController::class, 'index'])->name('products.index');

