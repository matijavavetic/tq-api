<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use src\Data\Models\Meal;

class MealFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     *
     */
    protected $model = Meal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomDate = $this->faker->dateTimeBetween('-25 years', 'now');

        return [
            'title' => $this->faker->word,
            'description' => $this->faker->sentence,
            'created_at' => $randomDate,
        ];
    }
}
