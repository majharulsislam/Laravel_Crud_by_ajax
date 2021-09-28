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

Route::get('/welcome', function () {
    return view('welcome');
});


//=====> Backend Routes
Route::group(['namespace' => 'App\Http\Controllers\Admin'], function() {
// For post
    Route::resource('/admin/post', 'PostController');
    Route::get('/admin/allpost', 'PostController@allpost')->name('all.post');
});
