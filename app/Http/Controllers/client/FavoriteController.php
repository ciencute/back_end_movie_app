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
     * add movie to your favorite movie
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

            return json_encode([
                'success' => true,
            ]);
        } catch (\Exception $exception) {
            return json_encode([
                'success' => false,
            ]);
        }

    }

    /**
     * remove movie from your favorite movie
     * @authenticated
     */
    public function removeFromFavoriteMovie(RemoveFromFavoriteMovieRequest $request)
    {
        try {
            FavoriteMovie::where('movieId', $request['movieId'])->where('userId', auth()->id())->first()->delete();
            Movie::findOrFail($request->movieId)->decrement('favoriteCount');

            return json_encode([
                'success' => true,
            ]);
        } catch (\Exception $exception) {
            return json_encode([
                'success' => false,
            ]);
        }
    }

    /**
     * add movie to your favorite actor
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
            return json_encode([
                'success' => true,
            ]);
        } catch (Error|Exception$exception) {
            return json_encode([
                'success' => false,
            ]);
        }

    }

    /**
     * remove movie from your favorite actor
     * @authenticated
     */
    public function removeFromFavoriteActor(RemoveFromFavoriteActorRequest $request)
    {
        try {
            FavoriteActor::where('actorId', $request['actorId'])->where('userId', auth()->id())->first()->delete();
            Actor::findOrFail($request->actorId)->decrement('favoriteCount');
            return json_encode([
                'success' => true,
            ]);
        } catch (Error|Exception $exception) {
            return json_encode([
                'success' => false,
            ]);
        }
    }
    /**
     * get your favorite actor
     * @authenticated
     */
    public function getFavoriteActor()
    {
        $favoriteActorIds = FavoriteActor::where('userId', auth()->id())->pluck('actorId');
        return Actor::whereIn('id', $favoriteActorIds)->paginate(10);
    }
    /**
     * get top 10 favorite actor of all
     * @authenticated
     */
    public function getTop10FavoriteActor() {
        return cache()->remember("favorite-top10actor", 60 * 60 * 24, function ()  {
            return Actor::orderBy('favoriteCount' ,'DESC')->limit(10)->get();
        });
    }
    /**
     * get top 10 favorite movie of all
     * @authenticated
     */
    public function getTop10FavoriteMovie() {
        return cache()->remember("favorite-top10movie", 60 * 60 * 24, function ()  {
            return Movie::orderBy('favoriteCount' ,'DESC')->limit(10)->get();
        });
    }

}
