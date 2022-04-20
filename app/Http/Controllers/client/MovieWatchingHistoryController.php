<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\WatchingHistory;

class MovieWatchingHistoryController extends Controller
{
    /**
     * get  movie in top 10 view of week
     * @authenticated
     */
    public function top10ViewOfWeek() {

        return cache()->remember("movie-TopviewWeek", 60 * 60 * 24, function () {
            return WatchingHistory::whereBetween('watching_history.createdAt' , [now()->subDays(7)->format('Y-m-d') , now()->format('Y-m-d')])
                ->orderBy('viewCount' ,'DESC')
                ->groupBy('movieId')
                ->leftJoin('movie' , 'movie.id' , '=' , 'watching_history.movieId')
                ->selectRaw('watching_history.movieId ,COUNT(*) as viewCount , movie.title , movie.img , movie.id ,movie.url ')
                ->limit(10)->get();
        });


    }
    public function topViewOfDay() {
        return cache()->remember("movie-TopviewDay", 60 * 60 * 24, function () {
            return WatchingHistory::where('createdAt' , now()->format('Y-m-d'))
                ->orderBy('viewCount' ,'DESC')
                ->groupBy('movieId')
                ->selectRaw('watching_history.* ,COUNT(*) as viewCount ')
                ->limit(10)->get();
        });
    }
    public function topViewOfMonth() {
        return cache()->remember("movie-TopviewMonth", 60 * 60 * 24, function () {
            return WatchingHistory::whereBetween('watching_history.createdAt' , [now()->subDays(30)->format('Y-m-d') , now()->format('Y-m-d')])
                ->orderBy('viewCount' ,'DESC')
                ->groupBy('movieId')
                ->selectRaw('watching_history.* ,COUNT(*) as viewCount ')
                ->limit(10)->get();
        });
    }
    public function topViewOfYear() {

    }
}
