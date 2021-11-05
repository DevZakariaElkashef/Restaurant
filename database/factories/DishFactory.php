<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(2 ,true),
            'price' => rand(20, 500),
            'quantity' => rand(200, 1000),
            'image' => 'meal.jpg',
            'content' => $this->faker->text(200),
            'category_id'  => rand(1,3),
            // 'category_id'  => function () {
            //     return Category::factory()->create()->id;
            // },

        ];
    }
}
