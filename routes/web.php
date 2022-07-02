<?php

use Illuminate\Support\Facades\Auth;
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

//home
Route::get('/', \App\Http\Livewire\Home\Index::class);
Route::get('/all' , \App\Http\Livewire\Home\Blog\Index::class);
Route::get('/all/update/{blog}' , \App\Http\Livewire\Home\Blog\Edit::class)->name('blog.edit');
Route::get('/blog/1' , \App\Http\Livewire\Home\Blog\Single::class);

//admin
Route::get('/admin',\App\Http\Livewire\Admin\Index::class);
Route::get('/blog',\App\Http\Livewire\Admin\Index::class);
Route::get('/test' , \App\Http\Livewire\Home\Test\Index::class);
Route::get('/users' , \App\Http\Livewire\Home\User\Index::class);
Route::get('/user/profile',\App\Http\Livewire\UserProfile::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
