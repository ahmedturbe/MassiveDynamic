<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\UserController::class, 'indexAdmin'])->name('admin')->middleware('admin');
Route::get('/secretary', [App\Http\Controllers\UserController::class, 'indexSecretary'])->name('secretary')->middleware('secretary');
Route::get('/client', [App\Http\Controllers\UserController::class, 'indexClient'])->name('client')->middleware('client');
Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('create')->middleware(['admin','secretary']);
Route::post('/store_user', [App\Http\Controllers\UserController::class, 'store'])->name('storeUser')->middleware(['admin','secretary']);
Route::get('/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('showUser');
Route::get('/editUser/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('editUser')->middleware('admin');
Route::put('/updateUser/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('updateUser')->middleware('admin');
Route::delete('/deleteUser/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroyUser')->middleware('admin');

