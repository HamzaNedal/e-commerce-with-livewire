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
            'name' => $this->faker->name,
            "description" => $this->faker->paragraph(),
            'stock'=>$this->faker->numberBetween(0,10000),
            'price'=>$this->faker->numberBetween(0,500),
            'status'=>$this->faker->numberBetween(0,1),
        ];
    }
}
