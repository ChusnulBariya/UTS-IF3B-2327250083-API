<?php

use App\Http\Controllers\PekerjaanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::get('/pekerjaan', [PekerjaanController::class, 'index']);
Route::post('/pekerjaan',[PekerjaanController::class, 'store']);
Route::patch('/pekerjaan/{pekerjaan}',[PekerjaanController::class, 'update']);
Route::delete('/pekerjaan/{pekerjaan}',[PekerjaanController::class, 'destroy']);
Route::get('/pekerjaan/{pekerjaan}',[PekerjaanController::class, 'show']);
