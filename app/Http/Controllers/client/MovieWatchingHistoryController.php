<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Movie;
use App\Models\WatchingHistory;

class MovieWatchingHistoryController extends Controller
{
    /**
     * top 10 phim được xem nhiều nhất trong tuần
     * @authenticated
     */
    public function top10ViewOfWeek()
    {


            return WatchingHistory::whereBetween('watching_history.createdAt', [now()->subDays(7), now()])
                ->orderBy('viewCount', 'DESC')
                ->groupBy('movieId')
                ->leftJoin('movie', 'movie.id', '=', 'watching_history.movieId')
                ->selectRaw('watching_history.movieId ,COUNT(*) as viewCount , movie.title , movie.img , movie.id ,movie.url ')
                ->limit(10)->get();



    }

    /**
     * top 10 phim xem nhiều nhất trong ngày
     * @authenticated
     */
    public function top10ViewOfDay()
    {
//        return now()->format('Y-m-d');

        return WatchingHistory::whereBetween('watching_history.createdAt', [now()->subDays(1), now()])
            ->orderBy('viewCount', 'DESC')
            ->groupBy('movieId')
            ->selectRaw('watching_history.* ,COUNT(*) as viewCount ')
            ->limit(10)->get();

    }

    /**
     * top 10 phim xem nhiều nhất trong tháng
     * @authenticated
     */
    public function top10ViewOfMonth()
    {
        return cache()->remember("movie-TopviewMonth", 60 * 60 * 24, function () {
            return WatchingHistory::whereBetween('watching_history.createdAt', [now()->subDays(30), now()])
                ->orderBy('viewCount', 'DESC')
                ->groupBy('movieId')
                ->selectRaw('watching_history.* ,COUNT(*) as viewCount ')
                ->limit(10)->get();
        });
    }

    /**
     * top 10 phim xem nhiều nhất trong năm
     * @authenticated
     */
    public function top10ViewOfYear()
    {
        return cache()->remember("movie-TopViewYear", 60 * 60 * 24, function () {
            return WatchingHistory::whereBetween('watching_history.createdAt', [now()->subDays(365), now()])
                ->orderBy('viewCount', 'DESC')
                ->groupBy('movieId')
                ->selectRaw('watching_history.* ,COUNT(*) as viewCount ')
                ->limit(10)->get();
        });
    }

    /**
     * lấy danh sách phim đã xem
     * @authenticated
     */
    public function getWatchedMovie()
    {
        $ids = WatchingHistory::where('userId', auth()->id())->pluck('movieId');
        return Movie::whereIn('id', $ids)->orderBy('createdAt' , 'DESC')->paginate(10);

    }
}
