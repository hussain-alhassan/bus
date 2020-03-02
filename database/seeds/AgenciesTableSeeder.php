<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AgenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agencies')->insert([
                [
                    'name' => 'حملة الرميلة', 'name_en' => 'Rumailah', 'logo' => 'agency_1_1582741517.jpeg',
                    'description' => 'This is a description for Rumailah agency',
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ],
                [
                    'name' => 'حملة الإسراء', 'name_en' => 'Al Esraa', 'logo' => 'agency_2_1582741278.jpg',
                    'description' => 'This is a description Al Esraa agency',
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ]
            ]
        );
    }
}
