<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $companyID = Company::pluck('id')->toArray();

        return [
            'last_name'     => fake()->lastName,
            'first_name'    => fake()->firstName,
            'designation'   => fake()->jobTitle,
            'company_id'    => collect($companyID)->random()
        ];
    }
}
