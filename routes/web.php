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
    return view('pages.home');
});

Route::get("/login", "AuthController@redirect")->name("login");
Route::get("/callback", "AuthController@callback");
Route::get("/logout", "AuthController@logout");

Route::get("/new", "ModController@new");
Route::post("/mods", "ModController@store");