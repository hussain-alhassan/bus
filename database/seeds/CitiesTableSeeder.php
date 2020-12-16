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
                ['name' => 'الأحساء', 'name_en' => 'Alahsa', 'is_active' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'الدمام', 'name_en' => 'Dammam', 'is_active' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'المدينة المنورة', 'name_en' => 'Medina', 'is_active' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name' => 'دبي', 'name_en' => 'Dubai', 'is_active' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ]
        );
    }
}
