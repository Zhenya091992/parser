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
Route::resource('Category', CategoryController::class)->names([
    'index' => 'catIndex',
    'create' => 'catCreate',
    'store' => 'catStore',
    'show' => 'catShow',
    'edit' => 'catEdit',
    'update' => 'catUpdate',
    'destroy' => 'catDestroy'
]);

Route::get('/', function () {
    return view('main');
});

Route::post('/Parse', [MainController::class, 'parse'])->name('parse');
