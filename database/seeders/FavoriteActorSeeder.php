<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\FavoriteActor;
use App\Models\FavoriteMovie;
use App\Models\Movie;
use App\Models\WatchingHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavoriteActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Actor::orderBy('id','desc')->chunk(200, function ($actors) {
            foreach ($actors as $actor) {
                $rand_number = rand(1, 99);
                for ($i = 0; $i < $rand_number; $i++)
                    try {
                        FavoriteActor::create([
                            'actorId' => $actor->id,
                            'userId' => rand(1, 199)
                        ]);
                    } catch (\Error|\Exception $exception) {
                        continue;
                    }

            }
        });
    }
}
