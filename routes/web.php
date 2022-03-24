<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;

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
})->name('home');

Route::resource('books', BookController::class);
Route::resource('users', UserController::class);

Route::get('list-books', [BookController::class,'listBooks'])->name('books.showlist');

Route::get('users/{userId}/end-load/{bookId}', [UserController::class, 'end_loan'])->name('users.end_load');
Route::post('users/get-load', [UserController::class, 'new_loan'])->name('users.new_load');

