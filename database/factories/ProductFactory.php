<?php

namespace Database\Factories;

use App\Models\Catalogue;
use App\Models\Category;
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
        $categoryIds = Category::pluck('id')->toArray();
        $catalogueIds = Catalogue::pluck('id')->toArray();

        return [
            'category_id' => $this->faker->randomElement($categoryIds),
            'catalogue_id' => $this->faker->randomElement($catalogueIds),
            'name_product' => $this->faker->word,
            'description' => $this->faker->sentence,
            'thumbnail' => 'product09.jpg',
            'views' => 0,
            'is_active' => true,
            'is_hot' => $this->faker->boolean(20), // 20% cơ hội là true
            'is_good_deal' => $this->faker->boolean(30), // 30% cơ hội là true
            'is_show_home' => $this->faker->boolean(50), // 50% cơ hội là true
        ];
    }
}
