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
    print_r("base resource");
});


Route::get('/users', function () {
    print_r("SERVICE 2 RUNNING,!!!!! modified!!!!");
    // return view('welcome');
});
