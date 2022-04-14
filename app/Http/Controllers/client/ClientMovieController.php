<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Repository\MovieRepository;

class ClientMovieController extends Controller
{
    protected $movieRepo ;

    public function __construct(MovieRepository $movieRepo)
    {
        parent::__construct();
        $this->movieRepo = $movieRepo;

    }

    /**
     * Get latest movie
     * @response{"id":304372,"title":"ThePerfectGuy","original_title":"ThePerfectGuy","img":"https://image.tmdb.org/t/p/w600_and_h900_bestv2/k1U3ROFFCVbu9H63lKYMbXEHeJI.jpg","url":"https://www.youtube.com/watch?v=CikoxQ4ytI4","embededCode":"<iframewidth=\"560\"height=\"315\"src=\"https://www.youtube.com/embed/CikoxQ4ytI4\"title=\"YouTubevideoplayer\"frameborder=\"0\"allow=\"accelerometer;autoplay;clipboard-write;encrypted-media;gyroscope;picture-in-picture\"allowfullscreen></iframe>","trailerKey":"CikoxQ4ytI4","directorId":null,"bgImg":"https://image.tmdb.org/t/p/w600_and_h900_bestv2/dFdLszJppFerIo1UrLo7pl7fqmJ.jpg","description":"Afterapainfulbreakup,Leahseemstomeettheperfectguy.Butshesoondiscoverssomeonemysteriouslylurkingaroundhersurroundings.","countryId":null,"duration":100,"viewCount":276,"categoryId":53,"slug":"the-perfect-guy","imdb":5.7,"isMovie18":0,"isFinished":1,"isMovieSeries":0,"totalEpisode":1,"quality":"fullHd","publishedAt":"2015-09-11","createdAt":"2022-04-12T01:30:27.000000Z","updatedAt":"2022-04-12T01:30:27.000000Z"}
     * @return mixed
     * @authenticated
     */
    public function getLatestMovie()
    {
        return Movie::orderBy('createdAt', 'DESC')->paginate(10);
    }

    /**
     * get movie by id
     * @urlParam id integer required The ID of the movie.
     * @authenticated
     */
    public function getById($id)
    {
        return Movie::findOrFail($id);
    }
    /**
     * watch movie
     * @urlParam $movieId integer required The ID of the movie. Example : 14
     * @authenticated
     */
    public function watch($movieId) {
        return $this->movieRepo->getMovieById($movieId)->url;

    }

}
