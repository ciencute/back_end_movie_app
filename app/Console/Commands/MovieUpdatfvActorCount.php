<?php

namespace App\Console\Commands;

use App\Models\Actor;
use App\Models\FavoriteActor;
use Illuminate\Console\Command;

class MovieUpdatfvActorCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie:favActorCount';

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
        Actor::chunk(100, function ($actors) {
            foreach ($actors as $actor) {
                $favCount = FavoriteActor::where('actorId' , $actor->id)->count();
                Actor::find($actor->id)->update([
                    'favoriteCount' => $favCount
                ]);
                $this->info("Update $actor->id"  . "with fav count : $favCount ");
            }
        });
        return 0;
    }
}
