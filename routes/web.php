<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/main', [HomeController::class,"main"]);
Route::post('/store', [HomeController::class, 'store'])->name('product.store');
Route::get('/{id}/edit', [HomeController::class,'edit'])->name('product.edit');
Route::put('/{id}/update', [HomeController::class,'update'])->name('product.update');
Route::get('/{id}/delete', [HomeController::class,'destory'])->name('product.delete');

