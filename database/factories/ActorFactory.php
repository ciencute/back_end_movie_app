<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Actor;

class ActorFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Actor::class;


    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'img' => "https://api.lorem.space/image/face?w=150&h=220&v=".rand(1,999999),
            'slug' => $this->faker->slug(),
            'detail' => $this->faker->text(),
        ];
    }
}
