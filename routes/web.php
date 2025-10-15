<?php

use App\Models\Order;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EmployeeSalaryController;

/** ROOT */
Route::get('/', function () {
    if (Auth::check()) {
        return Auth::user()->role == 'admin'
            ? redirect('/admin/dashboard')
            : redirect('/customer/home');
    }
    return redirect('/login');
});

/** AUTH MANUAL */
Route::get('/login', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Lupa password
Route::get('/forgot-password', [AuthController::class,'forgotForm'])->name('forgot.password');
Route::post('/reset-password-simple', [AuthController::class,'resetPassword'])->name('reset.password');

/** HALAMAN DASHBOARD */
Route::get('/admin/dashboard', [AdminController::class, 'index']);

/** HALAMAN CUSTOMER */
Route::get('/customer/home', function () {
    if (!Auth::check() || Auth::user()->role !== 'customer') {
        return redirect('/login')->with('error', 'Akses ditolak!');
    }

    $services = Service::all(); // Ambil semua layanan
    $orders = Order::where('user_id', Auth::id())->orderBy('order_date','desc')->take(5)->get(); // 5 pesanan terakhir

    return view('customer.home', compact('services','orders'));
});
Route::middleware(['auth'])->group(function() {
    Route::get('/customer/order/{service}', [OrderController::class, 'orderCustomer'])
        ->name('customer.order');
});


/** ADMIN ROUTES (CRUD & REPORTS) */

// Services
Route::get('/admin/services', [ServiceController::class, 'index']);
Route::get('/admin/services/create', [ServiceController::class, 'create']);
Route::post('/admin/services', [ServiceController::class, 'store']);
Route::get('/admin/services/{id}/edit', [ServiceController::class, 'edit']);
Route::put('/admin/services/{id}', [ServiceController::class, 'update']);
Route::delete('/admin/services/{id}', [ServiceController::class, 'destroy']);

// Orders
Route::get('/admin/orders', [OrderController::class, 'index']);
Route::get('/admin/orders/create', [OrderController::class, 'create']);
Route::post('/admin/orders', [OrderController::class, 'store']);
Route::get('/admin/orders/{id}/edit', [OrderController::class, 'edit']);
Route::put('/admin/orders/{id}', [OrderController::class, 'update']);
Route::delete('/admin/orders/{id}', [OrderController::class, 'destroy']);

// Expenses
Route::get('/admin/expenses', [ExpenseController::class, 'index']);
Route::get('/admin/expenses/create', [ExpenseController::class, 'create']);
Route::post('/admin/expenses', [ExpenseController::class, 'store']);
Route::get('/admin/expenses/{id}/edit', [ExpenseController::class, 'edit']);
Route::put('/admin/expenses/{id}', [ExpenseController::class, 'update']);
Route::delete('/admin/expenses/{id}', [ExpenseController::class, 'destroy']);

// Employee Salaries
Route::get('/admin/salaries', [EmployeeSalaryController::class, 'index']);
Route::get('/admin/salaries/create', [EmployeeSalaryController::class, 'create']);
Route::post('/admin/salaries', [EmployeeSalaryController::class, 'store']);
Route::get('/admin/salaries/{id}/edit', [EmployeeSalaryController::class, 'edit']);
Route::put('/admin/salaries/{id}', [EmployeeSalaryController::class, 'update']);
Route::delete('/admin/salaries/{id}', [EmployeeSalaryController::class, 'destroy']);

// Promos
Route::get('/admin/promos', [PromoController::class, 'index']);
Route::get('/admin/promos/create', [PromoController::class, 'create']);
Route::post('/admin/promos', [PromoController::class, 'store']);
Route::get('/admin/promos/{id}/edit', [PromoController::class, 'edit']);
Route::put('/admin/promos/{id}', [PromoController::class, 'update']);
Route::delete('/admin/promos/{id}', [PromoController::class, 'destroy']);

// Reports / Export PDF
// Route::get('/admin/reports/orders/pdf', [ReportController::class, 'ordersPDF']);
// Route::get('/admin/reports/expenses/pdf', [ReportController::class, 'expensesPDF']);
// Route::get('/admin/reports/salaries/pdf', [ReportController::class, 'salariesPDF']);

