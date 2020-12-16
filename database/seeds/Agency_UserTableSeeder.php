<?php

use App\Agency;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class Agency_UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agency_user')->insert([
                [
                    'agency_id' => Agency::where('name_en', 'Rumailah')->get('id')->first()->id,
                    'user_id' => User::where('email', 'abu_aqeel@rumailah.com')->first()->id,
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ],
                [
                    'agency_id' => Agency::where('name_en', 'Al-Esraa')->get('id')->first()->id,
                    'user_id' => User::where('email', 'abu_ali@al-esraa.com')->first()->id,
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ],
                [
                    'agency_id' => Agency::where('name_en', 'Al-Esraa')->get('id')->first()->id,
                    'user_id' => User::where('email', 'ali_sager@al-esraa.com')->first()->id,
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ],
                [
                    'agency_id' => Agency::where('name_en', 'Al-salem')->get('id')->first()->id,
                    'user_id' => User::where('email', 'abdullah@al-salem.com')->first()->id,
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ]
            ]
        );
    }
}
