<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/hostedpbx', 'App\Http\Controllers\Api\HostedPbxController@index');
Route::get('/hostedpbx/{hostedPbx}', 'App\Http\Controllers\Api\HostedPbxController@show');
