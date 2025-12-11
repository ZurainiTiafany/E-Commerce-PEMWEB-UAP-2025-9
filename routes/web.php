<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;

// Admin Controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\StoreManagementController;
use App\Http\Controllers\Admin\StoreVerificationController;


// Middleware
use App\Http\Middleware\AdminOnly;

//Seller Controller
use App\Http\Controllers\Seller\SellerDashboardController;
use App\Http\Controllers\Seller\StoreRegistrationController;
use App\Http\Controllers\Seller\SellerProfileController;
use App\Http\Controllers\Seller\SellerCategoryController;
use App\Http\Controllers\Seller\SellerProductController;
use App\Http\Controllers\Seller\SellerOrderController;
use App\Http\Controllers\Seller\SellerBalanceController;
use App\Http\Controllers\Seller\SellerWithdrawalController;

//Middleware
use App\Http\Middleware\SellerOnly;
// =====================
// Home
// =====================
Route::get('/', function () {
    return view('welcome');
});

// =====================
// LOGIN MANUAL ADMIN
// =====================
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.process');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// =====================
// Dashboard User (Breeze default)
// =====================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// =====================
// Profile (Breeze default)
// =====================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =====================
// ADMIN ROUTES
// =====================
Route::middleware(['auth', AdminOnly::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    // Dashboard admin
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // User management
    Route::get('/users', [UserManagementController::class, 'index'])->name('users');
    Route::delete('/users/{id}', [UserManagementController::class, 'delete'])->name('users.delete');

    // Store management
    Route::get('/stores', [StoreManagementController::class, 'index'])->name('stores.index');
    Route::get('/stores/create', [StoreManagementController::class, 'create'])->name('stores.create');
    Route::post('/stores', [StoreManagementController::class, 'store'])->name('stores.store');

    Route::get('/stores/{id}/edit', [StoreManagementController::class, 'edit'])->name('stores.edit');
    Route::put('/stores/{id}', [StoreManagementController::class, 'update'])->name('stores.update');

    Route::delete('/stores/{id}', [StoreManagementController::class, 'delete'])->name('stores.destroy');

    // Store verification
    Route::get('/verification', [StoreVerificationController::class, 'index'])->name('verification.index');
    Route::post('/verification/approve/{id}', [StoreVerificationController::class, 'approve'])->name('verification.approve');
    Route::post('/verification/reject/{id}', [StoreVerificationController::class, 'reject'])->name('verification.reject');
});

//seller
Route::middleware(['auth', 'seller'])
    ->prefix('seller')
    ->name('seller.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [SellerDashboardController::class, 'index'])->name('dashboard');

        // Profile toko
        Route::get('/profile', [SellerProfileController::class, 'index'])->name('profile');
        Route::put('/profile', [SellerProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [SellerProfileController::class, 'delete'])->name('profile.delete');

        // Categories
        Route::resource('categories', SellerCategoryController::class);

        // Products
        Route::resource('products', SellerProductController::class);

        // Orders
        Route::get('/orders', [SellerOrderController::class, 'index'])->name('orders');
        Route::put('/orders/{id}/status', [SellerOrderController::class, 'updateStatus'])->name('orders.updateStatus');

        // Balance
        Route::get('/balance', [SellerBalanceController::class, 'index'])->name('balance');

        // Withdrawals
        Route::get('/withdrawals', [SellerWithdrawalController::class, 'index'])->name('withdrawals');
        Route::post('/withdrawals', [SellerWithdrawalController::class, 'store'])->name('withdrawals.store');
    });

// =====================
// Aktifkan Breeze
// =====================
require __DIR__.'/auth.php';
