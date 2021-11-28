<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $nb = (int)$this->command->ask("How many Product you want to generate ?", 10);

        Produit::factory($nb)->create();
    }
}
