<?php

namespace App\Console\Commands;

use App\Jobs\CreateMailAcc;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class createMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:mail';

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
        for ($i=1 ; $i < 90 ; $i ++){
            CreateMailAcc::dispatch($i);
            $this->info("mail $i created");
        }

        return 0;
    }
}
