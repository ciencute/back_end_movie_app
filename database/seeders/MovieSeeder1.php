<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MovieSeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 200; $i <= 300; $i++) {
            try {
                $response = Http::get('https://api.themoviedb.org/3/movie/popular', [
                    'language' => 'en-Us',
                    'page' => $i,
                    'api_key' => "0607d645c16bb05fe8d92cfc78645e7a"
                ]);
                $movies = $response['results'];
                foreach ($movies as $movie) {
                    try {
                        $movieRes = Http::get('https://api.themoviedb.org/3/movie/' . $movie['id'], [
                            'api_key' => "0607d645c16bb05fe8d92cfc78645e7a"
                        ]);
                        $trailer = Http::get('https://api.themoviedb.org/3/movie/' . $movieRes['id'] . '/videos', [
                            'api_key' => "0607d645c16bb05fe8d92cfc78645e7a"
                        ]);

                        Movie::create([
                            'id' => $movieRes['id'],
                            'title' => $movieRes['title'],
                            'original_title' => $movieRes['original_title'],
                            'img' => "https://image.tmdb.org/t/p/w600_and_h900_bestv2" . $movieRes['poster_path'],
                            'url' => "https://www.youtube.com/watch?v=" . $trailer['results'][0]['key'],
                            'bgImg' => "https://image.tmdb.org/t/p/w600_and_h900_bestv2" . $movieRes['backdrop_path'],
                            'description' => $movieRes['overview'],
//                    'countryId' => $this->faker->word,
                            "embededCode" => '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $trailer['results'][0]['key'] . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
                            "trailerKey" => $trailer['results'][0]['key'],
                            'duration' => $movieRes['runtime'],
                            'viewCount' => $movieRes['vote_count'],
                            'categoryId' => $movieRes['genres'][0]['id'],
                            'slug' => Str::slug($movieRes['title']),
                            'imdb' => $movieRes['vote_average'],
                            'isMovie18' => rand(0, 1),
                            'isFinished' => rand(0, 1),
                            'isMovieSeries' => rand(0, 1),
                            'totalEpisode' => 1,
                            'quality' => "fullHd",
                            'publishedAt' => $movieRes['release_date'],

                        ]);
                    } catch (\Exception $exception) {
                        Log::info($exception);
                        continue;
                    }


                }
            } catch (\Exception $e) {
                Log::info($e);
                continue;
            }


        }

    }
}
