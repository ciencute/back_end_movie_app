<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use App\Repository\CategoryRepository;
use App\Repository\MovieRepository;
use App\Repository\SliderRepository;

class HomeController extends Controller
{
    protected $movieRepo;
    protected $categoryRepo;
    protected $sliderRepo;

    public function __construct(MovieRepository $movieRepo, CategoryRepository $categoryRepo , SliderRepository $sliderRepo)
    {
        parent::__construct();
        $this->movieRepo = $movieRepo;
        $this->categoryRepo = $categoryRepo;
        $this->sliderRepo = $sliderRepo;
    }

    /**
     * Home page
     * @authenticated
     */

    public function Home()
    {
        return response($this->getHomeData(), 200);

    }

    private function getHomeData()
    {
        $category = $this->categoryRepo->getAllCategory();
        $latestMovies = $this->movieRepo->get10LatestMovie();
        $mostViewMovies = $this->movieRepo->getMost10ViewMovie();
        $animationMovies = $this->movieRepo->get10AnimationMovie();
        $tvMovies = $this->movieRepo->get10TvMovie();
        $sliders =  $this->sliderRepo->getAllSlider();
        $top10FavoriteMovies = $this->movieRepo->getTop10FavoriteMovie();
        $your10FavoriteMovie = $this->movieRepo->getTop10YourFavoriteMovie();
        return [
            "categories" =>  $category,
            "slider" => $sliders,
            "movies" => [
                "mostViewMovies" => [
                    'name' => "Hot Movie",
                    'url' => route('movie.mostView'),
                    'data' => $mostViewMovies
                ],
                'top10FavoriteMovies' => [
                    'name' => "Top 10 Favorite Movie",
                    'url' => route('movie.favorite'),
                    'data' => $top10FavoriteMovies
                ],
                'Your10FavoriteMovies' => [
                    'name' => "Your Favorite Movies",
                    'url' => route('movie.yourFavorite'),
                    'data' => $your10FavoriteMovie
                ],
                "latestMovies" => [
                    'name' => "Latest Movie",
                    'url' => route('movie.latest'),
                    'data' => $latestMovies
                ],
                "tvMovies" => [
                    'name' => "TV series",
                    'url' => route('movie.tv'),
                    'data' => $tvMovies
                ],
                "animationMovies" => [
                    'name' => "Animation",
                    'url' => route('movie.animation'),
                    'data' => $animationMovies
                ],
            ]


        ];
    }
}
