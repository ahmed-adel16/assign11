<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Brand;

class ProductFactory extends Factory
{
    protected $model = Product::class;




    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'description' => $this->faker->sentence,
            'image_path' => 'https://via.placeholder.com/200x200.png',
            'brand_id' => Brand::inRandomOrder()->first()?->id ?? Brand::factory()->create()->id
        ];
    }
    
}
