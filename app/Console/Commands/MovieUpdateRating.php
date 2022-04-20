<?php

namespace App\Console\Commands;

use App\Models\Movie;
use App\Models\MovieRating;
use App\Models\WatchingHistory;
use Illuminate\Console\Command;

class MovieUpdateRating extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie:avgRating';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update movie average rating';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Movie::chunk(100, function ($movies) {
            foreach ($movies as $movie) {
                $avgRating = MovieRating::where('movieId' , $movie->id)->avg('ratingPoint');
                Movie::find($movie->id)->update([
                    'averageRating' => $avgRating
                ]);
                $this->info("Update $movie->id"  . "with avg rating : $avgRating ");
            }
        });
        return 0;
    }
}
