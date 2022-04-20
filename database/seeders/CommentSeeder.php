<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Movie;
use App\Models\WatchingHistory;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Factory::create();
        Movie::chunk(2000, function ($movies) use ($faker) {
            foreach ($movies as $movie) {
                $rand_number =  rand(1,10) ;
                for($i =0 ; $i <$rand_number;$i ++)
                    Comment::create([
                        'movieId' => $movie->id,
                        'userId' => rand(1,199),
                        'content' => $faker->text(200),
                    ]);
            }
        });
    }
}
