<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\StnkController;


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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/admin/logout',[AdminController::class, 'logout'])->name('admin.logout');

// semua route untuk user


Route::prefix('users')->group(function(){
    Route::get('/view',[UserController::class, 'UserView'])->name('user.view');
    Route::get('/add',[UserController::class, 'UserAdd'])->name('user.add');
    Route::post('/store',[UserController::class, 'UserStore'])->name('users.store');
    Route::get('/edit/{id}',[UserController::class, 'UserEdit'])->name('user.edit');
    Route::post('/update/{id}',[UserController::class, 'UserUpdate'])->name('users.update');
    Route::get('/delete/{id}',[UserController::class, 'UserDelete'])->name('user.delete');
});

//prefix barang
Route::prefix('barangs')->group(function(){
    Route::get('/view',[BarangController::class, 'BarangView'])->name('barang.view');
    Route::get('/add',[BarangController::class, 'BarangAdd'])->name('barang.add');
    Route::post('/store',[BarangController::class, 'BarangStore'])->name('barangs.store');
    Route::get('/edit/{id}',[BarangController::class, 'BarangEdit'])->name('barang.edit');
    Route::post('/update/{id}',[BarangController::class, 'BarangUpdate'])->name('barangs.update');
    Route::get('/delete/{id}',[BarangController::class, 'BarangDelete'])->name('barang.delete');
});

Route::prefix('stnks')->group(function(){
    Route::get('/view',[StnkController::class, 'StnkView'])->name('stnk.view');
    Route::get('/add',[StnkController::class, 'StnkAdd'])->name('stnk.add');
    Route::post('/store',[StnkController::class, 'StnkStore'])->name('stnks.store');
    Route::get('/edit/{id}',[StnkController::class, 'StnkEdit'])->name('stnk.edit');
    Route::post('/update/{id}',[StnkController::class, 'StnkUpdate'])->name('stnks.update');
    Route::get('/delete/{id}',[StnkController::class, 'StnkDelete'])->name('stnk.delete');
});