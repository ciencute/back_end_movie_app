<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MovieRating;

class MovieRatingFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = MovieRating::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'movieId' => $this->faker->randomNumber(),
            'userId' => $this->faker->randomNumber(),
        ];
    }
}
