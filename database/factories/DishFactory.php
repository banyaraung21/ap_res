<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Spaghetti Bolognese',
                'Chicken Curry',
                'Beef Stroganoff',
                'Tacos',
                'Margherita Pizza',
                'Pad Thai',
                'Sushi Roll',
                'Fried Rice',
                'Caesar Salad',
                'Lasagna'
            ]),
            'category_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
