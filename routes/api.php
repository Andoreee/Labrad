<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EkgApi;
use App\Http\Controllers\RadApi;
use App\Http\Controllers\LabApi;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(EkgApi::class)->group(function(){
    // Group
    Route::get('/ekg/group', 'group');
    Route::post('/ekg/group', 'addGroup');
    Route::put('/ekg/group/{id}', 'updateGroup');
    Route::delete('/ekg/group/{id}', 'deleteGroup');
    
    Route::get('/ekg/sg', 'showSG');
});
Route::controller(RadApi::class)->group(function(){
    // Group
    Route::get('/rad/group', 'group');
    Route::post('/rad/group', 'addGroup');
    Route::put('/rad/group/{id}', 'updateGroup');
    Route::delete('/rad/{id}', 'deleteGroup');
});
Route::controller(LabApi::class)->group(function(){
    // Group
    Route::get('/lab/group', 'group');
    Route::post('/lab/group', 'addGroup');
    Route::put('/lab/group/{id}', 'updateGroup');
    Route::delete('/lab/group/{id}', 'deleteGroup');
});