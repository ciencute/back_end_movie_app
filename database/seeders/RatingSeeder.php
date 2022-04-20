<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\MovieRating;
use App\Models\WatchingHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Movie::chunk(200, function ($movies) {
            foreach ($movies as $movie) {
                $rand_number = rand(1, 20);
                for ($i = 0; $i < $rand_number; $i++)
                    try {
                        MovieRating::create([
                            'movieId' => $movie->id,
                            'userId' => rand(1, 199),
                            'ratingPoint' => rand(1,5)
                        ]);
                    } catch (\Exception|\Error $exception) {
                        continue;
                    }

            }
        });
    }
}
