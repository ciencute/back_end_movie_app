<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddToFavoriteRequest;
use App\Http\Requests\RemoveFromFavoriteRequest;
use App\Models\Favorite;
use App\Models\User;
use App\Repository\UserRepository;
use Illuminate\Http\Request;


class UserActionController extends Controller
{
    protected $repo;
    public function __construct(UserRepository $userRepository)
    {
        parent::__construct();
        $this->repo = $userRepository;
    }
    /**
     * get user profile
     */

    public function profile($id) {
        return $this->repo->get($id);
    }

    /**
     * add movie to favorite
     * @authenticated
     */
    public function addToFavorite(AddToFavoriteRequest $request) {
        $insertData = [
            'userId' => \Auth::id(),
            'movieId' => $request->movieId,
        ];
        return Favorite::create($insertData);
    }
    /**
     * remove movie from favorite
     * @authenticated
     */
    public function removeFromFavorite(RemoveFromFavoriteRequest $request) {
        return Favorite::where('movieId' , $request['movieId'])->where('userId' , auth()->id())->first()->delete();
    }


}
