<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $genres = Genre::query()->pluck('id');

        return [
            'title'             => $this->faker->realText(100),
            'short_description' => $this->faker->realText(300),
            'description'       => $this->faker->realText(500),
            'genre_id'          => $genres->random(),
        ];
    }
}
