<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Database\Seeder;

class VenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $clients = Client::all();
        $produits = Produit::all();

        $nb = (int)$this->command->ask("How many Vente you want to generate ?", 10);

        Vente::factory($nb)->make()->each(function ($vente) use ($clients , $produits) {
            $vente->client_id = $clients->random()->id;
            $vente->produit_id = $produits->random()->id;
            $vente->save();
        });
        // Vente::factory($nb)->create();
    }
}
