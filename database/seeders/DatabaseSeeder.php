<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Organisation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Organisation::factory(10)
            ->create()
            ->each(fn ($organisation) =>
                Contact::factory(5)->create(['organisation_id' => $organisation->id])
            );
    }
}
