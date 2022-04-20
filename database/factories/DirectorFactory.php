<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Director;

class DirectorFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Director::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'detail' => $this->faker->word,
            'img' => "https://api.lorem.space/image/face?w=150&h=220&v=".rand(1,999999),
            'slug' => $this->faker->slug,
        ];
    }
}
