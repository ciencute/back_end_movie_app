<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddToFavoriteActorRequest;
use App\Http\Requests\AddToFavoriteMovieRequest;
use App\Http\Requests\RemoveFromFavoriteActorRequest;
use App\Http\Requests\RemoveFromFavoriteMovieRequest;
use App\Models\Actor;
use App\Models\FavoriteActor;
use App\Models\FavoriteMovie;
use App\Models\Movie;
use Error;
use Exception;
use Faker\Provider\en_UG\PhoneNumber;
use Illuminate\Http\Request;
use function auth;

class FavoriteController extends Controller
{
    /**
     * thêm phim vào danh sách yêu thích của bạn
     * @authenticated
     */
    public function addToFavoriteMovie(AddToFavoriteMovieRequest $request)
    {
        try {
            $insertData = [
                'userId' => \Auth::id(),
                'movieId' => $request->movieId,
            ];

            FavoriteMovie::create($insertData);
            Movie::findOrFail($request->movieId)->increment('favoriteCount');

            return response()->json([
                "success" => true,
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "success" => false,
            ]);
        }

    }

    /**
     * xóa phim khỏi danh sách yêu thích của bạn
     * @authenticated
     */
    public function removeFromFavoriteMovie(RemoveFromFavoriteMovieRequest $request)
    {
        try {
            $favor_item = FavoriteMovie::where('movieId', $request['movieId'])->where('userId', auth()->id());
            if($favor_item->get()->count() == 0) {
                return response()->json([
                    "success" => false,
                ]);
            }
            $favor_item->delete();
            Movie::findOrFail($request->movieId)->decrement('favoriteCount');

            return response()->json([
                "success" => true,
            ]);
        } catch (\Exception|Error $exception) {
            return response()->json([
                "success" => false,
            ]);
        }
    }

    /**
     * Thêm diễn viên vào danh sách yêu thích của bạn
     * @authenticated
     */
    public function addToFavoriteActor(AddToFavoriteActorRequest $request)
    {
        try {
            $insertData = [
                'userId' => \Auth::id(),
                'actorId' => $request->actorId,
            ];

            FavoriteActor::create($insertData);
            Actor::findOrFail($request->actorId)->increment('favoriteCount');
            return response()->json([
                "success" => true,
            ]);
        } catch (Error|Exception$exception) {
            return response()->json([
                "success" => false,
            ]);
        }

    }

    /**
     * Xóa diễn viên khỏi danh sách yêu thích của bạn
     * @authenticated
     */
    public function removeFromFavoriteActor(RemoveFromFavoriteActorRequest $request)
    {
        try {
            FavoriteActor::where('actorId', $request['actorId'])->where('userId', auth()->id())->first()->delete();
            Actor::findOrFail($request->actorId)->decrement('favoriteCount');
            return response()->json([
                "success" => true,
            ]);
        } catch (Error|Exception $exception) {
            return response()->json([
                "success" => false,
            ]);
        }
    }

    /**
     * lấy danh sách diễn viên yêu thích
     * @authenticated
     */
    public function getFavoriteActor()
    {
        $favoriteActorIds = FavoriteActor::where('userId', auth()->id())->pluck('actorId');
        return Actor::whereIn('id', $favoriteActorIds)->paginate(10);
    }

    /**
     * top 10 diễn viên được yêu thích nhất( có nhiều lượt thích nhất)
     * @authenticated
     */
    public function getTop10FavoriteActor()
    {
        return cache()->remember("favorite-top10actor", 60 * 60 * 24, function () {
            return Actor::orderBy('favoriteCount', 'DESC')->limit(10)->get();
        });
    }

    /**
     * Top 10 phim được yêu thích nhất
     * @authenticated
     */
    public function getTop10FavoriteMovie()
    {
        return cache()->remember("favorite-top10movie", 60 * 60 * 24, function () {
            return Movie::orderBy('favoriteCount', 'DESC')->limit(10)->get();
        });
    }

    /**
     * Danh sách phim được yêu thích nhất theo thứ tự
     * @authenticated
     */
    public function getTopFavoriteMovie()
    {
        return Movie::orderBy('favoriteCount', 'DESC')->paginate(10);
    }

}
