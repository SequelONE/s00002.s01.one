<?php

use App\Http\Controllers\EmployeeController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('employees', EmployeeController::class);

Route::get('/excel/create', [App\Http\Controllers\ExcelController::class, 'createDocument'])->name('excel');
Route::get('/watermark', [App\Http\Controllers\WatermarkController::class, 'watermark'])->name('watermark');