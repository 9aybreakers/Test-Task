<?php
namespace App\Http\Controllers\Admin\CategoryController;

namespace App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/article{slug}',[PostController::class, 'show'])->name('posts.single');

Route::get('/tag{slug}',[TagController::class, 'show'])->name('tags.single');

Route::group(['prefix'=>'admin'], function (){
    Route::get('/', [MainController::class, 'index'])->name('admin.index');
    Route::resource('/posts', PostsController::class);;
});

Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get( '/logout', [UserController::class, 'logout'])->name('logout');
