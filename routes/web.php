<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('user_register_page');
});

Route::post('regiter-submit',[UserController::class,'register_submit']);
Route::get('user-login',[UserController::class,'user_login_form'])->name('user_login_form');

Route::post('login-submit',[UserController::class,'login_submit'])->name('login_submit');
Route::get('dashboard',[UserController::class,'dashboard'])->name('dashboard');

Route::match(['get', 'post'], 'user-list', [UserController::class, 'user_list'])->name('user_list');

Route::get('/user-edit/{id}', [UserController::class, 'edit_user'])->name('user_edit');
Route::delete('/user-delete/{id}', [UserController::class, 'delete_user'])->name('user_delete');
Route::put('/user-update/{id}', [UserController::class, 'update_user'])->name('user_update');

Route::get('/add-book-form', [BookController::class, 'add_book']);

Route::post('book-submit',[BookController::class,'book_submit']);
Route::match(['get', 'post'],'book-list',[BookController::class,'book_list']);

Route::match(['get', 'post'],'user-book-list',[BookController::class,'user_book_list']);

Route::get('book-edit/{id}',[BookController::class,'book_edit'])->name('book.edit');
Route::delete('book-delete/{id}',[BookController::class,'book_delete'])->name('book.delete');

Route::put('/books/{id}', [BookController::class, 'book_update'])->name('book.update');

Route::post('/books/{id}/rate', [BookController::class, 'rateBook'])->name('book.rate');

Route::post('/logout', function () {
    Auth::logout(); // Log out the user
    return redirect('/user-login')->with('success', 'You have been logged out.');
})->name('logout');







