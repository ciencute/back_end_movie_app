<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FailedJob;

class FailedJobFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = FailedJob::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid,
            'connection' => $this->faker->text,
            'queue' => $this->faker->text,
            'payload' => $this->faker->text,
            'exception' => $this->faker->text,
            'failed_at' => $this->faker->dateTime(),
        ];
    }
}
