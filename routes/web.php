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

Route::group(['middleware' => ['auth']], function (){
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('character', \App\Http\Controllers\CharacterController::class);
    Route::resource('weapon', \App\Http\Controllers\WeaponController::class);
    Route::resource('scroll', \App\Http\Controllers\ScrollController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/battle', [App\Http\Controllers\BattleController::class, 'battle'])->name('battle');
    Route::get('/lobby', [App\Http\Controllers\BattleController::class, 'index'])->name('lobby');
    Route::post('/setCharacterPicture',[\App\Http\Controllers\CharacterController::class, 'setCharacterPicture'])->name('setCharacterPicture');
    Route::post('/createCharacter',[\App\Http\Controllers\CharacterController::class,'createCharacter'])->name('createCharacter');
    Route::post('/setWeapon',[\App\Http\Controllers\WeaponController::class,'setWeapon'])->name('setWeapon');
    Route::post('/changePlayabilityWeapon',[\App\Http\Controllers\WeaponController::class,'changePlayabilityWeapon'])->name('changePlayabilityWeapon');
    Route::post('/setScroll',[\App\Http\Controllers\ScrollController::class,'setScroll'])->name('setScroll');
    Route::post('/changePlayabilityScroll',[\App\Http\Controllers\ScrollController::class,'changePlayabilityScroll'])->name('changePlayabilityScroll');
    Route::get('/settings', [App\Http\Controllers\UserController::class, 'settings'])->name('settings');
    Route::post('/changePassword',[\App\Http\Controllers\UserController::class,'changePassword'])->name('changePassword');
    Route::delete('/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('delete');
    Route::delete('/deleteCharacter', [App\Http\Controllers\CharacterController::class, 'deleteCharacter'])->name('deleteCharacter');

});

