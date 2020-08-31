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

//Route::get('/', function () {
//    return view('page');
//});

Route::get('/', 'PageController@index');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('mails', 'HomeController@mails');

Route::resource('top', 'TopController');
Route::resource('topcta', 'TopCtaController');
Route::resource('topform', 'TopFormsController');
Route::resource('features', 'FeatController');
Route::resource('forms', 'FormsController');

Route::post('formgo', 'SendController@sendEmail');
Route::post('regwhats', 'SendController@regClick');

Route::resource('infos', 'InfosController');
Route::resource('prefs', 'PrefsController');
