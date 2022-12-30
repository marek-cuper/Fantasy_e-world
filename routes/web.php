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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');

Route::group(['middleware' => ['auth']], function (){
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('weapon', \App\Http\Controllers\WeaponController::class);
    Route::post('/setWeapon','\App\Http\Controllers\WeaponController@setWeapon');
});

