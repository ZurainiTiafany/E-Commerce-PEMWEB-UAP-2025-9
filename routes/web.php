<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;

// Admin Controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\StoreManagementController;
use App\Http\Controllers\Admin\StoreVerificationController;

//Member Controller
use App\Http\Controllers\Member\MemberDashboardController;
use App\Http\Controllers\Member\StoreRegistrationController;
use App\Http\Controllers\Member\ProductController;
use App\Http\Controllers\Member\CheckoutController;
use App\Http\Controllers\Member\PaymentController;
use App\Http\Controllers\Member\WalletController;
use App\Http\Controllers\Member\TransactionHistoryController;


// Middleware
use App\Http\Middleware\AdminOnly;



// LOGIN UMUM (USER BIASA)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
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

// =====================
// MEMBER ROUTES
// =====================
Route::middleware(['auth', 'member'])
    ->prefix('member')
    ->name('member.')
    ->group(function () {

    // Dashboard member
    Route::get('/dashboard', [MemberDashboardController::class, 'index'])->name('dashboard');

    // Registrasi Store (Seller)
    Route::get('/store/register', [StoreRegistrationController::class, 'create'])->name('store.register');
    Route::post('/store/register', [StoreRegistrationController::class, 'store'])->name('store.store');

    // ==============================
    // PRODUCT (List & Detail)
    // ==============================
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

    // ==============================
    // CHECKOUT
    // ==============================
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    // ==============================
    // PAYMENT
    // ==============================
    Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');

    // ==============================
    // WALLET
    // ==============================
    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet.index');

    // ==============================
    // TRANSACTION HISTORY
    // ==============================
    Route::get('/transactions', [TransactionHistoryController::class, 'index'])->name('transactions.index');
});
// =====================
// Aktifkan Breeze
// =====================
require __DIR__.'/auth.php';
