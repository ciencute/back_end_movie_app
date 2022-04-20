<?php
Route::post('login' , [\App\Http\Controllers\AuthController::class , 'login'])->name('login');
Route::post('logout' , [\App\Http\Controllers\AuthController::class , 'logout'])->name('logout');
Route::post('register' , [\App\Http\Controllers\AuthController::class , 'register'])->name('register');

Route::get('home' , [\App\Http\Controllers\client\HomeController::class, 'Home'])->name('home');

Route::prefix('movies')->group(function () {
    Route::get("latest" , [\App\Http\Controllers\client\ClientMovieController::class, 'getLatestMovie'] )->name('movie.latest');
    Route::get("mostView" , [\App\Http\Controllers\client\ClientMovieController::class, 'getMostViewMovies'] )->name('movie.mostView');
    Route::get("mostView/topWeek" , [\App\Http\Controllers\client\MovieWatchingHistoryController::class, 'top10ViewOfWeek'] )->name('movie.mostView.topViewOfWeek');




    Route::get("animation" , [\App\Http\Controllers\client\ClientMovieController::class, 'getAnimationMovies'] )->name('movie.animation');
    Route::get("tv-movie" , [\App\Http\Controllers\client\ClientMovieController::class, 'getTvMovie'] )->name('movie.tv');

    Route::get("/{id}" , [\App\Http\Controllers\client\ClientMovieController::class, 'getById'] );
    Route::get("watch/{movieId}" , [\App\Http\Controllers\client\ClientMovieController::class, 'watch'] );
    Route::get("category/{categoryId}" , [\App\Http\Controllers\client\ClientMovieController::class, 'getMovieByCategoryId'] )->name("movie.getByCategoryId");

    Route::get("actor/{actorId}" , [\App\Http\Controllers\client\ClientMovieController::class, 'getMovieByActorId'] )->name("movie.getByActorId");
    Route::get("director/{directorId}" , [\App\Http\Controllers\client\ClientMovieController::class, 'getMovieByDirectorId'] )->name("movie.getByDirectorId");

    Route::get("favorite/movie" , [\App\Http\Controllers\client\ClientMovieController::class, 'getFavoriteMovies'] )->name('movie.favorite');
    Route::get("favorite/movie/top10ofAll" , [\App\Http\Controllers\client\FavoriteController::class, 'getTop10FavoriteMovie'] )->name('movie.favorite.top10');

    Route::post("favorite/movie/add" , [\App\Http\Controllers\client\FavoriteController::class, 'addToFavoriteMovie'] )->name('movie.favorite.add');
    Route::post("favorite/movie/remove" , [\App\Http\Controllers\client\FavoriteController::class, 'removeFromFavoriteMovie'] )->name('movie.favorite.delete');
    Route::get("favorite/actor", [\App\Http\Controllers\client\FavoriteController::class, 'getFavoriteActor'] )->name('actor.favorite');

    Route::post("favorite/actor/add" , [\App\Http\Controllers\client\FavoriteController::class, 'addToFavoriteActor'] )->name('actor.favorite.add');
    Route::post("favorite/actor/remove" , [\App\Http\Controllers\client\FavoriteController::class, 'removeFromFavoriteActor'] )->name('actor.favorite.delete');
    Route::get("favorite/actor/top10ofAll" , [\App\Http\Controllers\client\FavoriteController::class, 'getTop10FavoriteActor'] )->name('actor.favorite.top10');

});

Route::prefix('category')->group(function () {
    Route::get("/" , [\App\Http\Controllers\client\CategoryController::class, 'getAllCategory'] )->name('category.all');


});
Route::prefix('user')->group(function () {
    Route::get("/profile" , [\App\Http\Controllers\client\UserActionController::class, 'profile'] )->name('user.profile');
    Route::get("/profile/{id}" , [\App\Http\Controllers\client\UserActionController::class, 'getProfileById'] )->name('user.profileById');
    Route::post("/editProfile" , [\App\Http\Controllers\client\UserActionController::class, 'editProfile'] )->name('user.editProfile');

    Route::post("/commentOnMovie" , [\App\Http\Controllers\client\UserActionController::class, 'commentOnMovie'] )->name('user.commentOnMovie');
    Route::post("/rating/movie" , [\App\Http\Controllers\client\UserActionController::class, 'rateMovie'] )->name('user.ratingMovie');
//    Route::post("/rating/movie/update" , [\App\Http\Controllers\client\UserActionController::class, 'updateMovieRating'] )->name('user.updateRatingMovie');


});

