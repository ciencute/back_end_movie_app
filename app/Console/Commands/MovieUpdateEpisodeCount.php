<?php

namespace App\Console\Commands;

use App\Models\Episode;
use App\Models\Movie;
use Illuminate\Console\Command;

class MovieUpdateEpisodeCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie:epiCount';

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
        Movie::where('categoryId' ,10770)->chunk(100, function ($movies) {
            foreach ($movies as $movie) {
                $epiCount = Episode::where('movieId' , $movie->id)->count();
                Movie::find($movie->id)->update([
                    'totalEpisode' => $epiCount
                ]);
                $this->info("Update movie #$movie->id"  . " with total episode : $epiCount ");
            }
        });
        return 0;
    }
}
