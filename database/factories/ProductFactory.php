<?php

namespace Database\Factories;

use App\Models\CategoryProduct;
use App\Models\File;
use App\Models\State;
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
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween('10000', '100000'),
            'quantity' => $this->faker->numberBetween('1', '100'),
            'stock' => $this->faker->numberBetween('5', '10'),
            'state_id' => State::inRandomOrder()->first()->id,
            'file_id' => File::inRandomOrder()->first()->id,
            'category_product_id' => CategoryProduct::inRandomOrder()->first()->id,
        ];
    }
}
