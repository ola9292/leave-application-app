<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HolidayRequestController;
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



Route::get('login', [SessionController::class, 'create'])->name('login');
Route::post('login', [SessionController::class, 'store'])->name('login.store');

Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::middleware('auth')->group(function(){

    Route::get('/', function () {
        return redirect('/holiday/create');
    });
    Route::post('logout', [SessionController::class, 'logout'])->name('logout');

    Route::get('holiday', [HolidayRequestController::class, 'index'])->name('holiday.index');
    Route::get('holiday/create', [HolidayRequestController::class, 'create'])->name('holiday.create');
    Route::post('holiday', [HolidayRequestController::class, 'store'])->name('holiday.store');

    Route::get('admin', [HolidayRequestController::class, 'admin'])->name('holiday.admin')->middleware('admin');
    Route::get('admin-history', [HolidayRequestController::class, 'history'])->name('holiday.history')->middleware('admin');
    Route::patch('/holiday-requests/{id}/accept', [HolidayRequestController::class, 'accept'])->name('holiday-requests.accept');
    Route::patch('/holiday-requests/{id}/reject', [HolidayRequestController::class, 'reject'])->name('holiday-requests.reject');

    Route::get('employees', [EmployeeController::class, 'getEmployees'])->name('holiday.employee')->middleware('admin');
    Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');
});


