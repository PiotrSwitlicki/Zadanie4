<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\ChangePasswordController;
use app\Http\Controllers\SalesReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});

Route::get('change-password', [App\Http\Controllers\ChangePasswordController::class, 'index'])->name('change.password.index');
Route::post('change-password', [App\Http\Controllers\ChangePasswordController::class, 'store'])->name('change.password');

Route::get('sales-report', [App\Http\Controllers\SalesReportController::class, 'index'])->name('sales.report');
Route::get('sales-report-getdata', [App\Http\Controllers\SalesReportController::class, 'getdata'])->name('sales.report.getdata');
Route::get('sales-tally', [App\Http\Controllers\SalesReportController::class, 'tally'])->name('sales.tally');
