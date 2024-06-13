<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $categoryIds = [1, 2, 3]; // Các category_id mong muốn

        return [
            'category_id' => $this->faker->randomElement($categoryIds),
            'name_product' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 200),
            'thumbnail' => 'https://routine.vn/media/amasty/webp/catalog/product/cache/5de180fdba0e830d350bd2803a0413e8/a/o/ao-polo-nam-27-10s24pol002p_bright_white_1__1_jpg.webp',
            'views' => 0,
            'is_active' => true,
            'is_hot' => $this->faker->boolean(20), // 20% cơ hội là true
            'is_good_deal' => $this->faker->boolean(30), // 30% cơ hội là true
            'is_show_home' => $this->faker->boolean(50), // 50% cơ hội là true
        ];
    }
}
