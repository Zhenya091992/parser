<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
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
Route::resource('Category', CategoryController::class);

Route::get('/', [MainController::class, 'index'])->name('main');

Route::get('Show/{id}', [MainController::class, 'show'])->name('show');

Route::post('Parse', [MainController::class, 'parse'])->name('parse');
