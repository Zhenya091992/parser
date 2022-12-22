<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\Authenticate;
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
Route::get('/', [MainController::class, 'index'])->name('main');

Route::get('Login', function() {
    return view('Auth.login');
})->name('loginForm');

Route::post('Login', [AuthController::class, 'login'])->name('login');

Route::get('Register', function() {
    return view('Auth.register');
})->name('registerForm');

Route::post('Register', [AuthController::class, 'registration'])->name('registration');

Route::middleware(Authenticate::class)->group(function() {
    Route::get('Cabinet/{userName}', [CabinetController::class, 'index'])->name('cabinet');

    Route::resource('Category', CategoryController::class);

    Route::get('Show/{id}', [MainController::class, 'show'])->name('show');

    Route::post('Parse', [MainController::class, 'parse'])->name('parse');

    Route::get('LogOut', [AuthController::class, 'logOut'])->name('logOut');

    Route::get('Cabinet/{userName}/setup', function ($userName) {
        return view('Cabinet.setup', ['userName' => $userName]);
    })->name('cabinetSetup');
});
