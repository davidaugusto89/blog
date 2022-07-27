<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
    return redirect()->route('posts.index');
});

Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/create', [PostController::class, 'create'])->middleware(['auth'])->name('posts.create');
Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::post('posts', [PostController::class, 'store'])->middleware(['auth'])->name('posts.store');

Route::get('posts/edit/{id}', [PostController::class, 'edit'])->middleware(['auth', 'user.permission:post'])->name('posts.edit');
Route::put('posts/{id}', [PostController::class, 'update'])->middleware(['auth', 'user.permission:post'])->name('posts.update');
Route::delete('posts/{id}', [PostController::class, 'destroy'])->middleware(['auth', 'user.permission:post'])->name('posts.destroy');


Route::get('profile', [UserController::class, 'profile'])->middleware(['auth'])->name('profile');
Route::post('profile', [UserController::class, 'update'])->middleware(['auth'])->name('profile.update');
Route::get('users', [UserController::class, 'list'])->middleware(['auth', 'user.permission:list'])->name('user.list');
Route::get('users/{id}', [UserController::class, 'changePermission'])->middleware(['auth', 'user.permission:change-permission'])->name('user.change_permission');


Auth::routes();