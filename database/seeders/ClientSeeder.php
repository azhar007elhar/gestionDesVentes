<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nb = (int)$this->command->ask("How many Client you want to generate ?", 10);
        Client::factory($nb)->create();
    }
}
