<?php

namespace App\Console\Commands;

use App\Models\Actor;
use App\Models\FavoriteActor;
use Illuminate\Console\Command;

class MovieSeedFavriteActor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie:seedfvactor';

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
        Actor::orderBy('id','desc')->chunk(200, function ($actors) {
            foreach ($actors as $actor) {
                $rand_number = rand(1, 99);
                for ($i = 0; $i < $rand_number; $i++)
                    try {
                    $userID =  rand(1, 199);
                        FavoriteActor::create([
                            'actorId' => $actor->id,
                            'userId' =>$userID
                        ]);
                        $this->info("create favorite actor #$actor->id"  . " for user #$userID ");
                    } catch (\Error|\Exception $exception) {
                        $this->info("**********Error create favorite actor #$actor->id"  . " for user #$userID ********");
                        continue;
                    }

            }
        });
        return 0;
    }
}
