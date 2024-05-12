<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

Route::get('/welcome',[UsersController::class, 'index'])->name('login');
Route::post('/login',[UsersController::class, 'post_login'])->name('post_login');
Route::get('/createUser',[UsersController::class, 'create_user'])->name('create_user');
Route::post('/user',[UsersController::class, 'post_user'])->name('post_user');

Route::group(['middleware' => 'user'], function(){

Route::get('/dashboard',[UsersController::class, 'user'])->name('user');
Route::get('/deposit',[UsersController::class, 'deposit'])->name('deposit');
Route::post('/deposit',[UsersController::class, 'deposit_amount'])->name('deposit_amount');
Route::get('/withdrawal',[UsersController::class, 'withdrawal'])->name('withdrawal');
Route::post('/withdrawal',[UsersController::class, 'withdraw_amount'])->name('withdraw_amount');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
});
Route::get('/', function () {
    return redirect()->route('login');
});
