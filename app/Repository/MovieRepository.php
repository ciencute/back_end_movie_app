<?php

namespace App\Repository;

use App\Models\Movie;

class MovieRepository
{
    public function getLatestMovie() {
        return Movie::orderBy('createdAt' ,'DESC')->paginate(20);
    }
    public function getMovieByCategoryId(int $categoryId ){
        return Movie::where('categoryId' , $categoryId)->firstOrFail();

    }
    public function getMovieBySlug(string $slug){
        return Movie::where("slug"  , $slug)->firstOrFail();

    }
    public function getMovieById(int $movieId){
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

}
