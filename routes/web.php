<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuggestionController;
// use App\Http\Controllers\InputVisitorController;
use App\Http\Controllers\DashboardUserController;
// use App\Http\Controllers\DashboardAccountController;

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

Route::get('/', [VisitorController::class, 'create'] );
Route::post('/', [VisitorController::class, 'store'] );

Route::resource('/suggestion', SuggestionController::class);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'create']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/visitor', VisitorController::class)->middleware('admin');
Route::delete('/dashboard/visitor', [VisitorController::class, 'destroy'] )->middleware('admin');

Route::resource('/dashboard/account', DashboardUserController::class)->middleware('admin');

Route::get('/thanks', function () {
    return view('suggestion.thanks');
});
