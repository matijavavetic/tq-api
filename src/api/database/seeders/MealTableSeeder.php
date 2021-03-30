<?php

namespace Database\Seeders;

use Database\Factories\CategoryFactory;
use Database\Factories\IngredientFactory;
use Database\Factories\MealFactory;
use Database\Factories\TagFactory;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MealTableSeeder extends Seeder
{
    public function run()
    {
        $mealFactory = new MealFactory();
        $tagFactory = new TagFactory();
        $ingredientFactory = new IngredientFactory();
        $categoryFactory = new CategoryFactory();
        $faker = Faker::create();

        $categoriesCollection = $categoryFactory
            ->count(30)
            ->create()
            ->each(function ($category) {
                $category->setSlug('category-' . $category->getId());
                $category->setTitle('category-' . $category->getId());
                $category
                    ->setTranslation('title', 'hr', 'kategorija-' . $category->getId())
                    ->setTranslation('title', 'de', 'kategorie-'. $category->getId())
                    ->save();
            });

        $tagsCollection = $tagFactory
            ->count(30)
            ->create()
            ->each(function ($tag) {
                $tag->setSlug('tag-' . $tag->getId());
                $tag->setTitle('tag-' . $tag->getId());
                $tag
                    ->setTranslation('title', 'hr', 'oznaka-' . $tag->getId())
                    ->setTranslation('title', 'de', 'etikett-'. $tag->getId())
                    ->save();
            });


        $ingredientsCollection = $ingredientFactory
            ->count(30)
            ->create()
            ->each(function ($ingredient) {
                $ingredient->setSlug('ingredient-' . $ingredient->getId());
                $ingredient->setTitle('ingredient-' . $ingredient->getId());
                $ingredient
                    ->setTranslation('title', 'hr', 'sastojak-' . $ingredient->getId())
                    ->setTranslation('title', 'de', 'zutat-'. $ingredient->getId())
                    ->save();
            });

        $mealsCollection = $mealFactory
                ->count(50)
                ->create()
                ->each(function ($meal) use ($tagsCollection, $ingredientsCollection, $categoriesCollection) {
                    $tags = $tagsCollection
                        ->random(rand(1,5))
                        ->pluck('id')
                        ->all();

                    $ingredients = $ingredientsCollection
                        ->random(rand(1,5))
                        ->pluck('id')
                        ->all();

                    $setCategory = rand(0,1);

                    if ($setCategory === 1) {
                        $category = $categoriesCollection->random();
                        $meal->category()->associate($category);
                    }

                    $meal->tags()->sync($tags);
                    $meal->ingredients()->sync($ingredients);
                    $meal->setTitle('meal-' . $meal->getId());
                    $meal->setUpdatedAt($meal->getCreatedAt());
                    $meal->setDescription('description of meal-' . $meal->getId());
                    $meal
                        ->setTranslation('title', 'hr', 'jelo-' . $meal->getId())
                        ->setTranslation('title', 'de', 'mahlzeit-' . $meal->getId())
                        ->setTranslation('description', 'hr', 'opis jela-' . $meal->getId())
                        ->setTranslation('description', 'de', 'beschreibung der mahlzeit-' . $meal->getId())
                        ->save();
            });

        foreach ($mealsCollection->random(15) as $meal) {
            $randomDate = $faker->dateTimeBetween($meal->getCreatedAt(), 'now');
            $meal->setUpdatedAt($randomDate);
            $meal->setStatus('updated');
            $meal->save();
        }

        foreach ($mealsCollection->random(10) as $meal) {
            $randomDate = $faker->dateTimeBetween($meal->getCreatedAt(), 'now');
            $meal->setDeletedAt($randomDate);
            $meal->setStatus('deleted');
            $meal->timestamps = false;
            $meal->save();
        }
    }
}