<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceShift;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Purchase;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/demo', function () {
    return view('demo');
})->name('demo');


Route::get('/dashboard', function () {
    return view('home');
})->name('dashboard');

Route::get('/posts', function () {
    return view('home');
})->name('posts');


Route::get('/login',        [LoginController::class, 'index'])  ->name('login');
Route::post('/login',       [LoginController::class, 'store']);

Route::post('/logout',      [LogoutController::class, 'store']) ->name('logout');

Route::get('/register',     [RegisterController::class, 'index'])->name('register');
Route::post('/register',    [RegisterController::class, 'store']);

// Employees Details
Route::get('/employee',     [EmployeeController::class, 'index'])->name('employee');
Route::post('/employee',     [EmployeeController::class, 'store'])->name('employee');
Route::get('/employees/create',     [EmployeeController::class, 'create'])->name('employees.create');
Route::put('/employees/{employees}/edit',     [EmployeeController::class, 'edit'])->name('employees.edit');

// Attendance Details
Route::get('/attendance',     [AttendanceController::class, 'index'])->name('attendance');
Route::get('/attendance/clearlog',    [AttendanceController::class, 'clearLog'])->name('attendance.clearlog');
Route::get('/attendance/adduser',    [AttendanceController::class, 'adduser'])->name('attendance.adduser');
Route::post('/attendance/adduser',    [AttendanceController::class, 'storeuser'])->name('attendance.adduser');
// Attendance device config
Route::get('/device',    [AttendanceController::class, 'update'])->name('device.update');

// Shift Settings
Route::get('/shift', [AttendanceShift::class, 'index'])->name('addshift');

Route::get('/addpurchase', [Purchase::class, 'index'])->name('purchase.add');
Route::post('/addpurchase', [Purchase::class, 'store'])->name('purchase.store');
Route::get('/purchase_list', [Purchase::class, 'purchase_list'])->name('purchase.purchase_list');
Route::post('/updatepurchase/{purchase_list:grn_no}', [Purchase::class, 'updatepurchaseview'])->name('purchase.update');

Route::post('/update', [Purchase::class, 'updatepurchase'])->name('purchase.updaterecord');


// For testing front-end calculations in purchase
Route::get('/test', function () {
    return view('purchase.test');
})->name('test');

