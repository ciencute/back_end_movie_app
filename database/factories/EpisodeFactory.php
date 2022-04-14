<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Episode;

class EpisodeFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Episode::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
//            'name' => $this->faker->name,
//            'movieId' => $this->faker->randomNumber(),
//            'url' => $this->faker->url,
//            'seasonId' => $this->faker->randomNumber(),
//            'slug' => $this->faker->slug,
        ];
    }
}
