<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_string' => $this->faker->name(),
            'email_string' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$MPpdkXLCOxsmHDQ7NG3m1.JwJjZWInVfMJaT2RWsl1FoE4okxZmBe', // password
            'phone_string' => $this->faker->numerify('(##) #####-####'),
            'access_level_enum' => $this->faker->randomElement(['ADM', 'EMPLOYEE' ,'USER', 'COMPOSER']),
            'birth_date' => $this->faker->date('Y-m-d'),
            'uri_photo_string' => 'https://fopiess.org.br/wp-content/uploads/2018/01/default1.jpg',
            'remember_token' => Str::random(10)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
