<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 10000),
            'discount_price' => $this->faker->randomFloat(2, 10, 10000),
            'html' => $this->faker->paragraph,
            'photos' => json_encode(['image1.png', 'image1.png', 'image1.png']),
        ];
    }
}
