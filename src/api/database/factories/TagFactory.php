<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use src\Data\Models\Tag;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     *
     */
    protected $model = Tag::class;

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Tag $tag) {
            $tag->setSlug('tag-' . $tag->getId());
            $tag->setTitle('tag-' . $tag->getId());
            $tag
                ->setTranslation('title', 'hr', 'oznaka-' . $tag->getId())
                ->setTranslation('title', 'de', 'etikett-'. $tag->getId());

        });
    }

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
            'created_at' => $randomDate,
        ];
    }
}
