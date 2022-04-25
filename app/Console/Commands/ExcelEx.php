<?php

namespace App\Console\Commands;

use App\Exports\TestExpost;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ExcelEx extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:export';

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
        Excel::store(new TestExpost(), 'movies.xlsx');
        return 0;
    }
}
