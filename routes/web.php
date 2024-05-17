<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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

route::get('/',[HomeController::class,'index']);



Route::group(['middleware'=>'guest'],function(){
    Route::get('login',[AuthController::class,'index'])->name('login');
    Route::post('login',[AuthController::class,'login'])->name('login');

    Route::get('register',[AuthController::class,'register_view'])->name('register');
    Route::post('register',[AuthController::class,'register'])->name('register')->middleware('throttle:2,1');
});



Route::group(['middleware'=>'auth'],function(){
    Route::get('home',[AuthController::class,'home'])->name('home');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});

// route::get('/home',[AuthController::class,'index']);

route::get('/category_page',[AuthController::class,'category_page']);
route::post('/add_category',[AuthController::class,'add_category']);
route::get('/cat_delete/{id}',[AuthController::class,'cat_delete']);
route::get('/edit_category/{id}',[AuthController::class,'edit_category']);
route::post('/update_category/{id}',[AuthController::class,'update_category']);

route::get('/add_book',[AuthController::class,'add_book']);
route::post('/store_book',[AuthController::class,'store_book']);

route::get('/show_book',[AuthController::class,'show_book']);

route::get('/book_delete/{id}',[AuthController::class,'book_delete']);

route::get('/edit_book/{id}',[AuthController::class,'edit_book']);

route::post('/update_book/{id}',[AuthController::class,'update_book']);
route::get('/book_details/{id}',[HomeController::class,'book_details']);

route::get('/order_books/{id}',[HomeController::class,'order_books']);

route::get('/order_request',[AuthController::class,'order_request']);

route::get('/accept_book/{id}',[AuthController::class,'accept_book']);

route::get('/rejected_book/{id}',[AuthController::class,'rejected_book']);

route::get('/book_history',[HomeController::class,'book_history']);

route::get('/cancel_req/{id}',[HomeController::class,'cancel_req']);

route::get('/explore',[HomeController::class,'explore']);
route::get('/details',[HomeController::class,'details']);
route::get('/index',[HomeController::class,'index']);

route::get('/search',[HomeController::class,'search']);

route::get('/cat_search/{id}',[HomeController::class,'cat_search']);
route::get('/cat_search',[HomeController::class,'cat_search']);








// 1 line code here