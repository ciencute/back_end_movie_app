<?php
Route::post('login' , [\App\Http\Controllers\AuthController::class , 'login'])->name('login');
Route::post('logout' , [\App\Http\Controllers\AuthController::class , 'logout'])->name('logout');
Route::get('home' , [\App\Http\Controllers\client\HomeController::class, 'Home'])->name('home');

Route::prefix('movies')->group(function () {
    Route::get("latest" , [\App\Http\Controllers\client\ClientMovieController::class, 'getLatestMovie'] );
    Route::get("/{id}" , [\App\Http\Controllers\client\ClientMovieController::class, 'getById'] );
    Route::get("watch/{movieId}" , [\App\Http\Controllers\client\ClientMovieController::class, 'watch'] );

});
