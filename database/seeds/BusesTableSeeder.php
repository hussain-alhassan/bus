<?php

use App\Agency;
use Illuminate\Database\Seeder;

class BusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buses')->insert([
                ['agency_id' => Agency::where('name', 'Rumailah')->get('id')->first()->id,
                    'licence_plate' => 'ح ط ص ٦٧٩٤', 'bus_number' => '11']
            ]
        );
    }
}
