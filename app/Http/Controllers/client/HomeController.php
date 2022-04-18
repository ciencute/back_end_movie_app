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
        $latestMovies = $this->movieRepo->get20LatestMovie();
        $mostViewMovies = $this->movieRepo->getMost20ViewMovie();
        $animationMovies = $this->movieRepo->get20AnimationMovie();
        $tvMovies = $this->movieRepo->get20TvMovie();
        $sliders =  $this->sliderRepo->getAllSlider();
        return [
            "categories" =>  $category,
            "slider" => $sliders,
            "movies" => [
                "mostViewMovies" => [
                    'name' => "Hot Movie",
                    'url' => route('movie.mostView'),
                    'data' => $mostViewMovies
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
