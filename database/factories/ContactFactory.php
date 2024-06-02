<?php
namespace Database\Factories;

use App\Models\Contact;
use App\Models\Organisation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'organisation_id' => Organisation::factory(),
            'e_mail' => $this->faker->unique()->safeEmail,
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'telephone_fixe' => $this->faker->phoneNumber,
            'service' => $this->faker->word,
            'fonction' => $this->faker->jobTitle,
        ];
    }
}