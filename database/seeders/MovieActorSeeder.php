<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\MovieActor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Movie::chunk(1000, function ($movies) {
           foreach ($movies as $movie) {
               $rand_number =  rand(5,10) ;
               for($i =0 ; $i <$rand_number;$i ++)
               MovieActor::create([
                   'movieId' => $movie->id,
                   'actorId' => rand(1,199)
               ]);
           }
        });
    }
}
