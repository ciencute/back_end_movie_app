<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FavoriteMovie;

class FavoriteFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = FavoriteMovie::class;

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
