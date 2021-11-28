<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        if($this->command->confirm("Do you want to refresh the database ?" , true)){
            $this->command->call("migrate:fresh");
            $this->command->info("Database was refreshed");
        }


        $this->call([
            ProduitSeeder::class ,
            ClientSeeder::class ,
            CategorySeeder::class
        ]);
    }
}
