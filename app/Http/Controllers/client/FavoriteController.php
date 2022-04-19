<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddToFavoriteActorRequest;
use App\Http\Requests\AddToFavoriteMovieRequest;
use App\Http\Requests\RemoveFromFavoriteActorRequest;
use App\Http\Requests\RemoveFromFavoriteMovieRequest;
use App\Models\FavoriteActor;
use App\Models\FavoriteMovie;
use App\Models\Movie;
use Error;
use Exception;
use Illuminate\Http\Request;
use function auth;

class FavoriteController extends Controller
{
    /**
     * add movie to favorite movie
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
            return json_encode([
                'success' => true,
            ]);
        }
        catch (\Exception $exception) {
            return json_encode([
                'success' => false,
            ]);
        }

    }

    /**
     * remove movie from favorite movie
     * @authenticated
     */
    public function removeFromFavoriteMovie(RemoveFromFavoriteMovieRequest $request)
    {
        try {
            FavoriteMovie::where('movieId', $request['movieId'])->where('userId', auth()->id())->first()->delete();
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
     * add movie to favorite actor
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
            return json_encode([
                'success' => true,
            ]);
        }
        catch (Error|Exception$exception) {
            return json_encode([
                'success' => false,
            ]);
        }

    }

    /**
     * remove movie from favorite actor
     * @authenticated
     */
    public function removeFromFavoriteActor(RemoveFromFavoriteActorRequest $request)
    {
        try {
            FavoriteActor::where('actorId', $request['actorId'])->where('userId', auth()->id())->first()->delete();
            return json_encode([
                'success' => true,
            ]);
        } catch (Error|Exception $exception) {
            return json_encode([
                'success' => false,
            ]);
        }
    }

}
