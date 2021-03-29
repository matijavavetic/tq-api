<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use src\Data\Models\Category;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     *
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomDate = $this->faker->dateTimeBetween('-30 years', 'now');

        return [
            'title' => $this->faker->word,
            'slug' => $this->faker->unique()->word,
            'created_at' => $randomDate
        ];
    }
}
