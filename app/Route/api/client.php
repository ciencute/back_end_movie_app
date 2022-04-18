<?php
Route::post('login' , [\App\Http\Controllers\AuthController::class , 'login'])->name('login');
Route::post('logout' , [\App\Http\Controllers\AuthController::class , 'logout'])->name('logout');
Route::get('home' , [\App\Http\Controllers\client\HomeController::class, 'Home'])->name('home');

Route::prefix('movies')->group(function () {
    Route::get("latest" , [\App\Http\Controllers\client\ClientMovieController::class, 'getLatestMovie'] )->name('movie.latest');
    Route::get("mostView" , [\App\Http\Controllers\client\ClientMovieController::class, 'getMostViewMovies'] )->name('movie.mostView');
    Route::get("animation" , [\App\Http\Controllers\client\ClientMovieController::class, 'getAnimationMovies'] )->name('movie.animation');
    Route::get("tv-movie" , [\App\Http\Controllers\client\ClientMovieController::class, 'getTvMovie'] )->name('movie.tv');

    Route::get("/{id}" , [\App\Http\Controllers\client\ClientMovieController::class, 'getById'] );
    Route::get("watch/{movieId}" , [\App\Http\Controllers\client\ClientMovieController::class, 'watch'] );
    Route::get("category/{categoryId}" , [\App\Http\Controllers\client\ClientMovieController::class, 'getMovieByCategoryId'] )->name("movie.getByCategoryId");

    Route::post("favorite/add" , [\App\Http\Controllers\client\UserActionController::class, 'addToFavorite'] )->name('movie.favorite.add');
    Route::post("favorite/remove" , [\App\Http\Controllers\client\UserActionController::class, 'removeFromFavorite'] )->name('movie.favorite.delete');

});

Route::prefix('category')->group(function () {
    Route::get("/" , [\App\Http\Controllers\client\CategoryController::class, 'getAllCategory'] )->name('category.all');


});
Route::prefix('user')->group(function () {
    Route::get("/" , [\App\Http\Controllers\client\CategoryController::class, 'getAllCategory'] )->name('category.all');
    Route::get("/{id}" , [\App\Http\Controllers\client\UserActionController::class, 'profile'] )->name('user.profile');

});

