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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard.dashboard');
});

Route::get('auto-complete-obat', 'ObatController@autoCompleteObat')->name('auto-complete-obat');
Route::get('auto-complete-signa', 'ObatController@autoCompleteSigna')->name('auto-complete-signa');
Route::get('stock-check', 'ObatController@stockCheck')->name('stock-check');
Route::get('recipe-list', 'ObatController@recipeList')->name('recipe-list');
Route::get('detail-recipe', 'ObatController@recipeDetail')->name('detail-recipe');
Route::get('download/{id}', 'ObatController@download')->name('download');
Route::post('create-non-racikan-recipe', 'ObatController@createNonRacikan')->name('create-non-racikan-receipt');
Route::post('create-racikan-recipe', 'ObatController@createRacikan')->name('create-racikan-receipt');

