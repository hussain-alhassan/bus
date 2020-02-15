<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
                ['name' => 'الأحساء | Al Ahsa', 'is_active' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Dammam | الدمام', 'is_active' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'Dubai | دبي', 'is_active' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ]
        );
    }
}
