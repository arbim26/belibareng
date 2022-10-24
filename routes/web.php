<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtikelController;
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

Route::get('/add', function () {
    return view('dashboards.admins.addartikel');
});

Route::get('/artikel', [ArtikelController::class, 'show'])->name('show');
Route::post('/add_process',[ArtikelController::class, 'store'])->name('add_process');
Route::get('/addartikel',[ArtikelController::class, 'addartikel'])->name('addartikel');
Route::get('/detail/{id}',[ArtikelController::class, 'detail']);
Route::get('/admin',[ArtikelController::class, 'show_by_admin'])->name('admin');
Route::get('/edit/{id}',[ArtikelController::class, 'edit'])->name('edit');
Route::put('/edit_process/{id}',[ArtikelController::class, 'update']);
Route::delete('/delete/{id}', [ArtikelController::class, 'destroy']);


Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
        Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
        Route::get('profile',[AdminController::class,'profile'])->name('profile');
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

