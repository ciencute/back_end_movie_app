<?php

namespace App\Repository;

use App\Models\Movie;

class MovieRepository
{
    protected $categories = [
        'adventure' => 12,
        'tv-movie' => 10770,
        'animation' =>16,
        'fantasy' =>14,
        'action' => 28,
    ];
    public function getLatestMovie() {
        return Movie::orderBy('createdAt' ,'asc')->paginate(20);
    }
    public function getMovieByCategoryId(int $categoryId ){
        return Movie::where('categoryId' , $categoryId)->paginate(20);

    }
    public function get20LatestMovie()
    {
        return Movie::orderBy('createdAt', 'DESC')->limit(20)->get();
    }
    public function getMovieBySlug(string $slug){
        return Movie::where("slug"  , $slug)->firstOrFail();
    }
    public function getMovieById(int $movieId){
        Movie::findOrFail($movieId)->increment('viewCount');
        return Movie::findOrFail($movieId);
    }
    public function create(array $movieData): \Illuminate\Database\Eloquent\Model|Movie
    {
        return Movie::create($movieData);
    }
    public function update(int $movieId ,array $updatedData) {
        return Movie::findOrFail($movieId)->update($updatedData);
    }
    public function delete(int $movieId) {
        return Movie::destroy($movieId);
    }
    public function getMovieByCountryId(int $countryId) {
        return Movie::whereCountryId($countryId)->firstOrFail();
    }
    public function getMostViewMovie() {
        return Movie::orderBy('viewCount' , 'desc')->paginate(20);
    }
    public function getMost20ViewMovie() {
        return Movie::orderBy('viewCount' , 'desc')->limit(20)->get();
    }

    public function get20AdventureMovie() {
        return cache()->remember('top20-adventure', 60*60*24 , function ()  {
            return Movie::where( 'categoryId',$this->categories['adventure'])->limit(20)->get();

        });
//        return Movie::where( 'categoryId',$this->categories['adventure'])->limit(20)->get();
    }
    public function getAdventureMovie() {
        return Movie::where( 'categoryId',$this->categories['adventure'])->paginate(20);
    }
    public function get20TvMovie() {
        return cache()->remember('top20-tv-movie', 60*60*24 , function ()  {
            return Movie::where( 'categoryId',$this->categories['tv-movie'])->limit(20)->get();
        });
//        return Movie::where( 'categoryId',$this->categories['tv-movie'])->limit(20)->get();
    }
    public function getTvMovie() {
        return Movie::where( 'categoryId',$this->categories['tv-movie'])->paginate(20);
    }
    public function get20AnimationMovie() {
        return cache()->remember('top20-animation', 60*60*24 , function ()  {
            return Movie::where( 'categoryId',$this->categories['animation'])->limit(20)->get();

        });
//        return Movie::where( 'categoryId',$this->categories['animation'])->limit(20)->get();
    }
    public function getAnimationMovie() {
        return Movie::where( 'categoryId',$this->categories['animation'])->paginate(20);
    }


}
