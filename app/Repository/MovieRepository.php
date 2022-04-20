<?php

namespace App\Repository;

use App\Models\Movie;
use App\Models\MovieActor;
use App\Models\WatchingHistory;

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
        return Movie::orderBy('createdAt' ,'asc')->paginate(10);
    }
    public function getMovieByCategoryId(int $categoryId ){
        return Movie::where('categoryId' , $categoryId)->paginate(10);

    }
    public function get20LatestMovie()
    {
        return Movie::orderBy('createdAt', 'DESC')->limit(10)->get();
    }
    public function getMovieBySlug(string $slug){
        return Movie::where("slug"  , $slug)->firstOrFail();
    }
    public function getMovieById(int $movieId){
        Movie::findOrFail($movieId)->increment('viewCount');
        WatchingHistory::create([
            'movieId' => $movieId,
            'userId' => auth()->id(),
        ]);
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
        return Movie::whereCountryId($countryId)->paginate(10);
    }
    public function getMostViewMovie() {
        return Movie::orderBy('viewCount' , 'desc')->paginate(10);
    }
    public function getMost20ViewMovie() {
        return Movie::orderBy('viewCount' , 'desc')->limit(10)->get();
    }

    public function get20AdventureMovie() {
        return cache()->remember('top20-adventure', 60*60*24 , function ()  {
            return Movie::where( 'categoryId',$this->categories['adventure'])->limit(10)->get();

        });
//        return Movie::where( 'categoryId',$this->categories['adventure'])->limit(10)->get();
    }
    public function getAdventureMovie() {
        return Movie::where( 'categoryId',$this->categories['adventure'])->paginate(10);
    }
    public function get20TvMovie() {
        return cache()->remember('top20-tv-movie', 60*60*24 , function ()  {
            return Movie::where( 'categoryId',$this->categories['tv-movie'])->limit(10)->get();
        });
//        return Movie::where( 'categoryId',$this->categories['tv-movie'])->limit(10)->get();
    }
    public function getTvMovie() {
        return Movie::where( 'categoryId',$this->categories['tv-movie'])->paginate(10);
    }
    public function get20AnimationMovie() {
        return cache()->remember('top20-animation', 60*60*24 , function ()  {
            return Movie::where( 'categoryId',$this->categories['animation'])->limit(10)->get();

        });
//        return Movie::where( 'categoryId',$this->categories['animation'])->limit(10)->get();
    }
    public function getAnimationMovie() {
        return Movie::where( 'categoryId',$this->categories['animation'])->paginate(10);
    }
    public function getMovieByActorId($actorId) {
        $movieIds = MovieActor::where('actorId' , $actorId)->pluck('movieId');
        return Movie::whereIn('id' , $movieIds)->paginate(10);
    }

    public function getMovieByDirectorId($directorId)
    {
        return Movie::where('directorId' ,$directorId )->paginate(10);

    }


}
