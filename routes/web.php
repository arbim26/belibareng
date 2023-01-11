<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\VisiController;
use App\Http\Controllers\MisiController;

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


Route::get('/',[HomeController::class,'index'], function () {
    return view('beforeLogin.home');
});
Route::get('/sip', function () {
    return view('artikel.sip');
});
Route::get('/loginadmin', function () {
    return view('auth.loginadmin');
});
Route::get('/registeradmin', function () {
    return view('auth.registeradmin');
}); 




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});
    
    Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
        Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
        Route::get('informasi',[AdminController::class,'informasi'])->name('informasi');
        Route::get('slider',[AdminController::class,'slider'])->name('slider');
        Route::get('aboutus',[AdminController::class,'aboutus'])->name('aboutus');
        Route::get('contactus',[AdminController::class,'contactus'])->name('contactus');
        Route::get('artikel',[AdminController::class,'artikel'])->name('artikel');
        Route::get('product',[AdminController::class,'product'])->name('product');
        Route::get('order',[AdminController::class,'order'])->name('order');
        Route::get('payment',[AdminController::class,'payment'])->name('payment');
        Route::get('profileadmin',[AdminController::class,'admin'])->name('profileadmin');
        Route::get('accountuser',[AdminController::class,'user'])->name('accountuser');

        // Chartline
        Route::get('/regiuser', [AdminController::class, 'regiuser']);
        // Chartline

        Route::resource('article',ArticleController::class);
        Route::resource('aboutus',AboutusController::class); 
        Route::resource('visi',VisiController::class); 
        Route::resource('misi',MisiController::class); 
        Route::resource('slider',SliderController::class);
        Route::resource('product',ProductController::class);
        Route::resource('order',OrderController::class);    
        Route::resource('satuan',SatuanController::class);    
        Route::resource('pack',PackController::class);    

        Route::get('/search',[ArticleController::class,'search'])->name('article.search');  

    });

    
    Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
        Route::get('detailartikel/{id}',[UserController::class,'detail'])->name('detailartikel');
        Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
        Route::get('tentangkami',[UserController::class,'tentangkami'])->name('tentangkami');
        Route::get('alamat',[UserController::class,'alamat'])->name('alamat');
        Route::get('password',[UserController::class,'password'])->name('password');
        Route::get('form.checkout',[UserController::class,'checkout'])->name('form.checkout');

        Route::get('checkout',[CheckoutController::class,'store'])->name('checkout');

        Route::get('daftarpesanan',[UserController::class,'daftarpesanan'])->name('daftarpesanan');
        
        // profile
        // Route::resource('profile',UserController::class);
        // Route::get('profile',[UserController::class,'profile'])->name('profile');
        Route::put('profile.update',[UserController::class, 'updateprofile'])->name('profile.update');
        Route::get('profile',[UserController::class, 'profile'])->name('profile');
        // profile
        // artiekel
        Route::get('artikel',[UserController::class,'artikel'])->name('artikel');
        Route::get('detailartikel/{id}',[UserController::class,'detail'])->name('detailartikel');
        // artiekel

        // produk
        Route::get('produk',[UserController::class,'produk'])->name('produk');
        Route::get('detailproduk/{id}',[UserController::class,'product'])->name('detailproduk');
        // produk

        // cart
        Route::resource('cart', CartController::class);
        Route::post('cart.plus/{id}',[CartController::class, 'plus'])->name('cart.plus');
        Route::post('cart.minus/{id}',[CartController::class, 'min'])->name('cart.minus');
        Route::post('clear', [CartController::class, 'clear'])->name('cart.clear');
        // cart

    });

