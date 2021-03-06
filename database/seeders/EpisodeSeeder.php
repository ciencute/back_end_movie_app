<?php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\Movie;
use App\Models\WatchingHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class EpisodeSeeder extends Seeder
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
                $season_rand = rand(0 ,1);
                for($season = 1 ; $season <= $season_rand ;$season ++) {
                    $rand_number = rand(1,10);
                    for($i =1 ; $i <$rand_number;$i ++) {
                        $name = 'Episode '.$i;
                        Episode::create([
                            'name' => $name ,
                            'movieId' => $movie->id,
                            'url' =>'https://movieapi.tk/uploads/videos/totam/Facebook_2.mp4',
                            'seasonId' => $season,
                            'slug' => $movie->id.'-'.Str::slug($name)
                        ]);
                    }

                }


            }
        });
    }
}
