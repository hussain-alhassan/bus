<?php

use App\Agency;
use App\City;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trips')->insert([
                ['trip_number' => 'ABC111',
                    'agency_id' => Agency::where('name_en', 'Rumailah')->get('id')->first()->id,
                    'from_city_id' => City::where('name_en', 'Alahsa')->get('id')->first()->id,
                    'to_city_id' => City::where('name_en', 'Medina')->get('id')->first()->id,
                    'depart' => (Carbon::now()->addDays(4))->setTime(15, 30),
                    'duration' => '10',
                    'available_seats' => 20,
                    'price' => 150,
                    'is_wifi' => true,
                    'is_refreshment' => false,
                    'is_meal' => false,
                    'is_bathroom' => true,
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ],
                ['trip_number' => 'ABC222',
                    'agency_id' => Agency::where('name_en', 'Al-Esraa')->get('id')->first()->id,
                    'from_city_id' => City::where('name_en', 'Alahsa')->get('id')->first()->id,
                    'to_city_id' => City::where('name_en', 'Medina')->get('id')->first()->id,
                    'depart' => (Carbon::now()->addDays(5))->setTime(16, 0),
                    'duration' => '10',
                    'available_seats' => 10,
                    'price' => 200,
                    'is_wifi' => true,
                    'is_refreshment' => false,
                    'is_meal' => true,
                    'is_bathroom' => true,
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ],
                ['trip_number' => 'EFG333',
                    'agency_id' => Agency::where('name_en', 'Al-salem')->get('id')->first()->id,
                    'from_city_id' => City::where('name_en', 'Alahsa')->get('id')->first()->id,
                    'to_city_id' => City::where('name_en', 'Dubai')->get('id')->first()->id,
                    'depart' => (Carbon::now()->addDays(5))->setTime(21, 0),
                    'duration' => '12',
                    'available_seats' => 30,
                    'price' => 100,
                    'is_wifi' => true,
                    'is_refreshment' => false,
                    'is_meal' => false,
                    'is_bathroom' => true,
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ],
            ]
        );
    }
}
