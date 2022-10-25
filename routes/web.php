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
    return view('beforeLogin.home');
});

Route::get('/loginadmin', function () {
    return view('auth.loginadmin');
});
Route::get('/registeradmin', function () {
    return view('auth.registeradmin');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
        Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
        Route::get('informasi',[AdminController::class,'informasi'])->name('informasi');
        Route::get('slider',[AdminController::class,'slider'])->name('slider');
        Route::get('aboutus',[AdminController::class,'aboutus'])->name('aboutus');
        Route::get('contactus',[AdminController::class,'contactus'])->name('contactus');
        Route::get('article',[AdminController::class,'article'])->name('article');
        Route::get('product',[AdminController::class,'product'])->name('product');
        Route::get('order',[AdminController::class,'order'])->name('order');
        Route::get('payment',[AdminController::class,'payment'])->name('payment');
        Route::get('profiles',[AdminController::class,'profiles'])->name('profiles');
    });


    Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
        Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
        Route::get('tentangkami',[UserController::class,'tentangkami'])->name('tentangkami');
        Route::get('artikel',[UserController::class,'artikel'])->name('artikel');
        Route::get('subartikel',[UserController::class,'subartikel'])->name('subartikel');
        Route::get('produk',[UserController::class,'produk'])->name('produk');
        Route::get('detailproduk',[UserController::class,'detailproduk'])->name('detailproduk');
        Route::get('profile',[UserController::class,'profile'])->name('profile');
        Route::get('alamat',[UserController::class,'alamat'])->name('alamat');
        Route::get('password',[UserController::class,'password'])->name('password');
        Route::get('cart',[UserController::class,'cart'])->name('cart');
        Route::get('daftarpesanan',[UserController::class,'daftarpesanan'])->name('daftarpesanan');
    });

