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
            'name'=>$this->faker->text(100),
//            'user_id'=>\App\Models\User::inRandomOrder()->first()->id,
////            'user_id'=>rand(1, 30),
            'description'=>$this->faker->text(1000),
            'main_picture'=>$this->faker->imageUrl(500, 500),
            'images'=>$this->faker->imageUrl,
            'price'=>rand(500, 15000),
        ];
    }
}
