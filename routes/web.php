<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\MobilController;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);
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

route::get('/', [App\Http\Controllers\FrontController::class, 'index']);
route::get('/car', [App\Http\Controllers\FrontController::class, 'show']);
route::get('/about', [App\Http\Controllers\FrontController::class, 'about']);
route::get('detail/{id}',[App\Http\Controllers\FrontController::class, 'detail']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {
Route::resource('jenis', JenisController::class);
Route::resource('merk', MerkController::class);
Route::resource('mobil', MobilController::class);
});