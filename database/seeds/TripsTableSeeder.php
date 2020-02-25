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
                ['trip_number' => 'ABC123',
                    'agency_id' => Agency::where('name_en', 'Rumailah')->get('id')->first()->id,
                    'from_city_id' => City::where('name', 'الأحساء')->get('id')->first()->id,
                    'to_city_id' => City::where('name', 'دبي')->get('id')->first()->id,
                    'depart' => Carbon::tomorrow(),
                    'duration' => '10',
                    'available_seats' => 20,
                    'is_bathroom' => true,
                    'is_wifi' => true,
                    'is_meal' => false,
                    'is_refreshment' => false,
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ],
                ['trip_number' => 'XYZ987',
                    'agency_id' => Agency::where('name_en', 'Rumailah')->get('id')->first()->id,
                    'from_city_id' => City::where('name', 'دبي')->get('id')->first()->id,
                    'to_city_id' => City::where('name', 'الأحساء')->get('id')->first()->id,
                    'depart' => new Carbon('next month'),
                    'duration' => '11',
                    'available_seats' => 15,
                    'is_bathroom' => true,
                    'is_wifi' => true,
                    'is_meal' => false,
                    'is_refreshment' => false,
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ],
            ]
        );
    }
}
