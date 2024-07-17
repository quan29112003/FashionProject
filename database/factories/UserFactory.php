<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $birthday = $this->faker->dateTimeBetween('-50 years', '-18 years');
        $age = now()->diffInYears($birthday);

        return [
            'name_user' => $this->faker->name,
            'birthday' => $birthday,
            'age' => $age,
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->address,
            'password' => Hash::make('password'), // Đặt mật khẩu mặc định là 'password'
            'role' => 0, // Mặc định role là 0
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
