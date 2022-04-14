<?php

namespace Database\Seeders;

use App\Models\Actor;
use Database\Factories\ActorFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $actorArr = [];
        for($i = 1 ; $i<= 500 ; $i++) {
            $response = Http::get('https://api.themoviedb.org/3/person/popular', [
                'language' => 'en-Us',
                'page' => $i,
                'api_key' => "0607d645c16bb05fe8d92cfc78645e7a"
            ]);
            $actors = $response['results'];
            foreach ($actors as $actor) {
                $actorRes = Http::get('https://api.themoviedb.org/3/person/'.$actor['id'], [
                    'api_key' => "0607d645c16bb05fe8d92cfc78645e7a"
                ]);

                Actor::create([
                    "id" => $actorRes['id'],
                    "name" => $actorRes['name'],
                    "slug" => Str::slug($actorRes['name']),
                    "img" => "https://image.tmdb.org/t/p/w600_and_h900_bestv2".$actorRes['profile_path'],
                    "gender"=> $actorRes['gender'],
                    "detail" => $actorRes['biography']

                ]);

            }


        }


    }
}
