<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Movie;
use Illuminate\Support\Str;

class MovieFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Movie::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        $name = $this->faker->name;
        return [
            'name' => $name,
            'enName' => $this->faker->word,
            'img' => "https://api.lorem.space/image/movie?w=300&h=400?v=".rand(1,9999999),
            'url' => $this->faker->url,
            'directorId' => $this->faker->randomNumber(),
            'bgImg' => $this->faker->word,
            'description' => $this->faker->text,
            'countryId' => $this->faker->word,
            'duration' => $this->faker->randomNumber(),
            'viewCount' => $this->faker->randomNumber(),
            'categoryId' => $this->faker->randomNumber(),
            'slug' => Str::slug($name),
            'imdb' => $this->faker->randomFloat(2,1,10),
            'isMovie18' => rand(0,1),
            'isFinished' => rand(0,1),
            'isMovieSeries' => rand(0,1),
            'totalEpisode' => 1,
            'quality' => "fullHd",
            'publishedAt' => $this->faker->dateTime(),
        ];
    }
}
