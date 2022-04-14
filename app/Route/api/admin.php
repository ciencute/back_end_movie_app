<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('movies')->group(function () {
    Route::get("/" , [\App\Http\Controllers\admin\MovieController::class , 'getLatest']);
    Route::post("/" , [\App\Http\Controllers\admin\MovieController::class , 'create']);
    Route::put("/" , [\App\Http\Controllers\admin\MovieController::class , 'update']);
    Route::delete("/" , [\App\Http\Controllers\admin\MovieController::class , 'delete']);


});

Route::prefix('actors')->group(function () {
    Route::get("/" , function (){
        return "abc";
    });
});

Route::prefix('users')->group(function () {
    Route::get("/", [\App\Http\Controllers\admin\UserController::class, 'getAll']);
    });
