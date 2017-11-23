<?php

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::prefix('enrolement')->group(function () {
    Route::get('/', 'EnrolementController@index')->name('enrolement.index');

    Route::get('/choix-de-l-armee', 'EnrolementController@chooseArmy')->name('enrolement.chooseArmy');
    Route::get('/choix-de-l-armee/post/{armyId}', 'EnrolementController@chooseArmyPost')->name('enrolement.chooseArmy.post');

    Route::get('/creation-des-soldats', 'EnrolementController@createSoldiers')->name('enrolement.createSoldiers');
    Route::post('/creation-des-soldats/post', 'EnrolementController@createSoldiersPost')->name('enrolement.createSoldiers.post');
});
