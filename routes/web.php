<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
        Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    });


    Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
<<<<<<< HEAD
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('tentangkami',[UserController::class,'tentangkami'])->name('tentangkami');
});
=======
        Route::get('dashboard',[UserController::class,'index'])->name('index');
        Route::get('tentangkami',[UserController::class,'tentangkami'])->name('tentangkami');
        Route::get('artikel',[UserController::class,'artikel'])->name('artikel');
        Route::get('produk',[UserController::class,'produk'])->name('produk');
    });
>>>>>>> 48506eb051cfc0a96f009aeb45b3d1e4e8f63173
