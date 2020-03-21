<?php

use App\Agency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class OfficesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offices')->insert([
                ['agency_id' => Agency::where('name_en', 'Rumailah')->get('id')->first()->id,
                    'name' => 'Rumailah Ahsa Office', 'address' => 'Rumailah downtown',
                    'location_link' => 'https://goo.gl/maps/PmnMyXBandzx9Diz5', 'hours' => '4-9 Every day',
                    'phone' => '013-596-2166', 'is_main_branch' => true, 'is_active' => true,
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            ]
        );
    }
}
