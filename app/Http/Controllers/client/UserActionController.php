<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddToFavoriteMovieRequest;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\RemoveFromFavoriteMovieRequest;
use App\Http\Requests\UpdateRatingMovieRequest;
use App\Http\Requests\UserCommentOnMovieRequest;
use App\Http\Requests\UserRateMovieRequest;
use App\Models\Comment;
use App\Models\FavoriteMovie;
use App\Models\Movie;
use App\Models\MovieRating;
use App\Models\User;
use App\Repository\UserRepository;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;


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
     * @authenticated
     */

    public function profile()
    {
        return $this->repo->get(auth()->id());
    }

    /**
     * get user profile by ID
     * @urlParam id integer required The ID of movie
     */

    public function getProfileById($id)
    {
        return $this->repo->get($id);
    }

    /**
     * edit user profile
     * @authenticated
     */
    public function editProfile(EditProfileRequest $request)
    {
        try {
            $this->repo->update(auth()->id(), $this->filterEditProfile($request));
//            return $request;
            return json_encode([
                'success' => true,
                'message' => "update profile successfully"
            ]);
        } catch (Error|Exception$exception) {
            return json_encode([
                'success' => false,
                'message' => "update profile unsuccessfully"
            ]);
        }

    }

    private function filterEditProfile(Request $request): array
    {
        $data = array_filter($request->all(), function ($e) {
            return $e != null || $e != '';
        });
        if ($request->file('img') != null) {
            $data['img'] = env("UPLOAD_PATH") . Storage::disk("public_uploads")->putFileAs("images/" . auth()->id() . Str::slug($request->title), $request->file('img'), $request->file('img')->getClientOriginalName());

        }
        if ($request->password != "" || $request->password != null) {
            $data['password'] = bcrypt($request->password);
        }
        return $data;
    }

    /**
     * Comment on movie
     * @authenticated
     */
    public function commentOnMovie(UserCommentOnMovieRequest $request)
    {
        try {
            Comment::create([
                'userId' => auth()->id(),
                'content' => $request['content'],
                'movieId' => $request['movieId']
            ]);
            return json_encode([
                'success' => true,
            ]);
        } catch (Error|Exception) {
            return json_encode([
                'success' => false,
            ]);
        }


    }

    /**
     * Rating a movie đánh giá phim và cập nhật đánh giá phim
     * @authenticated
     */
    public function rateMovie(UserRateMovieRequest $request)
    {
        try {
            $rating = MovieRating::where('movieId', $request->movieId)->where('userId' , auth()->id())->first();
            if ($rating == null) {
                MovieRating::create([
                    'userId' => auth()->id(),
                    'ratingPoint' => $request['ratingPoint'],
                    'movieId' => $request['movieId']
                ]);

            }
            else {
                MovieRating::where('movieId', $request->movieId)->where('userId' , auth()->id())->update
                ([
                    'ratingPoint' => $request['ratingPoint'],
                    'movieId' => $request['movieId'],
                    'updatedAt' => now()
                ]);
            }
            $avg = MovieRating::where('movieId' ,$request['movieId'])->average('ratingPoint');
//            return $avg;
            Movie::find($request['movieId'])->update([
                'averageRating' => $avg
            ]);
            return json_encode([
                'success' => true,
            ]);

        } catch (Error|Exception) {
            return json_encode([
                'success' => false,
            ]);
        }


    }

    /**
     * Update Movie Rating cập nhập đánh giá
     * @authenticated
     */
    public function updateMovieRating(UpdateRatingMovieRequest $request)
    {
        try {
            MovieRating::where('movieId', $request->movieId)->update
            ([
                'ratingPoint' => $request['ratingPoint'],
                'movieId' => $request['movieId'],
                'updatedAt' => now()
            ]);
            return json_encode([
                'success' => true,
            ]);
        } catch (Error|Exception) {
            return json_encode([
                'success' => false,
            ]);
        }


    }


}
