<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MovieActor;

class MovieActorFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = MovieActor::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'actorId' => $this->faker->randomNumber(),
            'movieId' => $this->faker->randomNumber(),
        ];
    }
}
