<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->sentence(2),
            'description' => $this->faker->text($maxNbChars = 255),
            'status' => "Nuevo",
            "inventory" => $this->faker->numberBetween($min = 100, $max = 2000),
            "price" => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 50, $max = 500),
            "active" => $this->faker->numberBetween($min = 1, $max = 2)
        ];
    }
}
