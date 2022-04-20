<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 1 ; $i < 30 ; $i ++) {
            Season::create([
                'name' => 'Season '.$i,
                'description' => 'Season '.$i,
            ]);
        }
    }
}
