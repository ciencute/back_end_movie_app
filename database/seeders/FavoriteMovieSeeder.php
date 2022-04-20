<?php

namespace Database\Seeders;

use App\Models\FavoriteMovie;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavoriteMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Movie::chunk(100, function ($movies) {
            foreach ($movies as $movie) {
                $rand_number = rand(1, 99);
                for ($i = 0; $i < $rand_number; $i++)
                    try {
                        FavoriteMovie::create([
                            'movieId' => $movie->id,
                            'userId' => rand(1, 199)
                        ]);
                    } catch (\Error|\Exception $exception) {
                        continue;
                    }

            }
        });
    }
}
