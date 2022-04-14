<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MovieTag;

class MovieTagFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = MovieTag::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'movieId' => $this->faker->randomNumber(),
            'tagId' => $this->faker->randomNumber(),
        ];
    }
}
