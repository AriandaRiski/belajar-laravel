<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\galerycontroller;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\produk_admcontroller;


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
    return view('v_home');
});

Route::get('/admin', function () {
    return view('/admin/v_homeadmin');
});
Route::view('/profil',('v_profil'));
Route::view('/contact',('v_contact'));
Route::view('/testimoni',('v_testimoni'));
Route::view('/artikel',('v_artikel'));
//Route::view('/admin',('/admin/v_homeadmin'));

//produk
Route::get('/product',[productcontroller::class, 'index']);
Route::get('/admin.produk',[produk_admcontroller::class, 'index'])->name('produk');
Route::get('/admin.add',[produk_admcontroller::class, 'add']);
Route::POST('/admin.insert',[produk_admcontroller::class, 'insert']);
Route::get('/admin/edit/{id_produk}',[produk_admcontroller::class, 'edit']);
Route::POST('/admin/update/{id_produk}',[produk_admcontroller::class, 'update']);
Route::get('/admin/delete/{id_produk}',[produk_admcontroller::class, 'delete']);


//galeri
Route::get('/galery',[galerycontroller::class, 'index']);
Route::get('/galery/detail/{id_galeri}',[galerycontroller::class, 'detail']);
Route::get('/admin.galery',[produk_admcontroller::class, 'index2'])->name('galeri');
Route::get('/admin.add2',[produk_admcontroller::class, 'add2']);
Route::POST('/admin.insert2',[produk_admcontroller::class, 'insert2']);
Route::get('/admin/edit_galeri/{id_galeri}',[produk_admcontroller::class, 'edit2']);
Route::post('/admin/update_galeri/{id_galeri}',[produk_admcontroller::class, 'update2']);
Route::get('/admin/delete_galeri/{id_galeri}',[produk_admcontroller::class, 'delete2']);


//artikel
Route::get('/artikel',[productcontroller::class, 'index_artikel']);
Route::get('/admin.artikel',[produk_admcontroller::class, 'index3'])->name('artikel');
Route::get('/admin.add_artikel',[produk_admcontroller::class, 'add_artikel']);
Route::POST('/admin.insert_artikel',[produk_admcontroller::class, 'insert_artikel']);
Route::get('/admin/edit_artikel/{index_artikel}',[produk_admcontroller::class, 'edit3']);
Route::post('/admin/update_artikel/{id_artikel}',[produk_admcontroller::class, 'update3']);
Route::get('/admin/delete_artikel/{id_artikel}',[produk_admcontroller::class, 'delete3']);





Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index']);
