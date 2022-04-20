<?php

namespace App\Console\Commands;

use App\Models\FavoriteActor;
use App\Models\FavoriteMovie;
use App\Models\Movie;
use Illuminate\Console\Command;

class MovieSeedFavoriteMovie extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie:seedfvmovie';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Movie::orderBy('id', 'desc')->chunk(200, function ($movies) {
            foreach ($movies as $movie) {
                $rand_number = rand(1, 99);
                for ($i = 0; $i < $rand_number; $i++)
                    try {
                        $userID = rand(1, 1000);
                        FavoriteMovie::create([
                            'movieId' => $movie->id,
                            'userId' => $userID
                        ]);
                        $this->info("create favorite movie #$movie->id" . " for user #$userID ");
                    } catch (\Error|\Exception $exception) {
                        $this->info("********** Error create favorite movie #$movie->id" . " for user #$userID ********");
                        continue;
                    }

            }
        });
        return 0;
    }
}
