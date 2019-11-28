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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'DashboardController@index')->name('home');
Route::get('/patient', 'DashboardController@patient')->name('patient');
Route::get('/doctor', 'DashboardController@doctor')->name('doctor');
Route::get('/ward', 'DashboardController@ward')->name('ward');
Route::get('/operation', 'DashboardController@operation')->name('operation');


// Route::get('/dashboard/v2', 'DashboardController@versiontwo')->name('v2');
// Route::get('/dashboard/v3', 'DashboardController@versionthree')->name('v3');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
