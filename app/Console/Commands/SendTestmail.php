<?php

namespace App\Console\Commands;

use App\Jobs\SendMailTest;
use App\Mail\TestMail;
use App\Models\FavoriteMovie;
use App\Models\Movie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendTestmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:sendtest';

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
//                Mail::to("hieudepzaai@gmail.com" )->send(new TestMail($movie));
                SendMailTest::dispatch($movie);
//                sleep(1);
                $this->info("sending $movie->title"  . " at  " . now());
            }
        });
//        Mail::to("hieudepzaai@gmail.com" )->send(new TestMail(Movie::find(12)));

        return 0;
    }
}
