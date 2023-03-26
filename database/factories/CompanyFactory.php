<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $compName   = fake()->company;
        $compSuffix = fake()->companySuffix;

        return [
            'name'          => $compName . " " . $compSuffix,
            'type'          => fake()->randomElement(['Sole Proprietorship', 'Partnership', 'S Corporation', 'Limited Liability']),
            'address'       => fake()->address,
            'net_worth'     => fake()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 99999999),
        ];
    }
}
