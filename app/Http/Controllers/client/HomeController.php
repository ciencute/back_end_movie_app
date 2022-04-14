<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use App\Repository\CategoryRepository;
use App\Repository\MovieRepository;

class HomeController extends  Controller
{
    protected $movieRepo;
    protected $categoryRepo;
    public function __construct(MovieRepository $movieRepo ,CategoryRepository $categoryRepo)
    {
        parent::__construct();
        $this->movieRepo = $movieRepo;
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * Home page
     * @authenticated
     */

    public function Home() {
        return response($this->getHomeData(),200);

    }
    private  function getHomeData () {
        $category = $this->categoryRepo->getAllCategory();
        $latestMovie  = $this->movieRepo->getLatestMovie();
        return [
            "categories" => $category,
            "latestMovie" => $latestMovie
        ];
    }
}
