<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('meetings', 'MeetingsController')->only([ 'index','show','store', 'update']);
Route::apiResource('participants', 'ParticipantsController')->only([ 'index','show','store', 'update']);
Route::apiResource('entities/{entity}/participants', 'MeetingParticipantsController')->only([ 'index','show','store', 'update']);
