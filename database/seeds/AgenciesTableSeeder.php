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
                    'name' => 'حملة الرميلة', 'name_en' => 'Rumailah', 'logo' => 'agency_1.jpeg',
                    'description' => 'This is a description for Rumailah agency',
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ],
                [
                    'name' => 'حملة الإسراء', 'name_en' => 'Al-Esraa', 'logo' => 'agency_2.png',
                    'description' => 'This is a description for Al-Esraa agency',
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ],
                [
                    'name' => 'السالم للنقل والسياحة', 'name_en' => 'Al-salem', 'logo' => 'agency_3.jpg',
                    'description' => 'This is a description for Al-salem',
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ]
            ]
        );
    }
}
