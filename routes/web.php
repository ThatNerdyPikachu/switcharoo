<?php

use App\Mod;

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
    $mods = Mod::all()->chunk(3);
    return view('pages.home', ["mods" => $mods]);
})->name("home");

Route::get("/login", "AuthController@redirect")->name("login");
Route::get("/callback", "AuthController@callback");
Route::get("/logout", "AuthController@logout")->name("logout");

Route::get("/mods/new", "ModController@new")->name("new");
Route::post("/mods", "ModController@store");
Route::get("/mods/{mod}", "ModController@view")->name("view");