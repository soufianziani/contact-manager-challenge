<?php

namespace Database\Factories;

use App\Enums\OrganizationStatus;
use App\Models\Organisation;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganisationFactory extends Factory
{
    protected $model = Organisation::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->company,
            'adresse' => $this->faker->address,
            'code_postal' => $this->faker->postcode(),
            'ville' => $this->faker->city,
            'statut' => $this->faker->randomElement(OrganizationStatus::values()),
        ];
    }
}
