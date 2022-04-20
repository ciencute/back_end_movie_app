<?php

namespace App\Console\Commands;

use App\Models\FavoriteActor;
use App\Models\FavoriteMovie;
use App\Models\Movie;
use Illuminate\Console\Command;

class MovieUpdatfvMovieCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie:favMovieCount';

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
        Movie::chunk(100, function ($movies) {
            foreach ($movies as $movie) {
                $favCount = FavoriteMovie::where('movieId' , $movie->id)->count();
                Movie::find($movie->id)->update([
                    'favoriteCount' => $favCount
                ]);
                $this->info("Update $movie->id"  . "with fav count : $favCount ");
            }
        });
         return 0;
    }
}
