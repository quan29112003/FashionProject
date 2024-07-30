<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productIds = Product::pluck('id')->toArray();
        $colorIds = ProductColor::pluck('id')->toArray();
        $sizeIds = ProductSize::pluck('id')->toArray();

        return [
            'product_id' => $this->faker->randomElement($productIds),
            'color_id' => $this->faker->randomElement($colorIds),
            'size_id' => $this->faker->randomElement($sizeIds),

            'quantity' => $this->faker->numberBetween(0, 100),
            'price' => $this->faker->numberBetween(100000, 10000000),
            'price_sale' => $this->faker->numberBetween(50000, 9500000),

            'SKU' => $this->faker->unique()->regexify('[A-Z0-9]{8}'),
            'is_active' => $this->faker->boolean(80), // 80% cơ hội là true
        ];
    }
}
