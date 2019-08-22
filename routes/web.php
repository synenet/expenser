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
    return view('welcome');
});


Route::get('expenses', 'LoadController@expenses');
Auth::routes();

//Expenses
Route::group(['namespace' => 'Expenses', 'prefix' => 'expenses'], function(){
    Route::get('/', 'PagesController@expenses');
    Route::post('addExpense', 'PagesController@addExpense');

});

Route::get('/home', 'HomeController@index')->name('home');
