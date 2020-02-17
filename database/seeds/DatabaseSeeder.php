<?php

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
         $this->call(UsersTableSeeder::class);
         $this->call(CitiesTableSeeder::class);
         $this->call(AgenciesTableSeeder::class);
         $this->call(OfficesTableSeeder::class);
         $this->call(BusesTableSeeder::class);
         $this->call(TripsTableSeeder::class);
    }
}
