<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
use App\City;
use App\Agency;
use App\Office;
use App\Trip;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Bookings
        DB::table('bookings')->insert([
                [
                    'user_id' => User::where('email', 'a@a.com')->get('id')->first()->id,
                    'trip_id' => '1',
                    'seats' => '1',
                    'status' => 'Confirmed',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'user_id' => User::where('email', 'b@b.com')->get('id')->first()->id,
                    'trip_id' => '1',
                    'seats' => '1',
                    'status' => 'Pending',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'user_id' => User::where('email', 'c@c.com')->get('id')->first()->id,
                    'trip_id' => '2',
                    'seats' => '1',
                    'status' => 'Rejected',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'user_id' => User::where('email', 'd@d.com')->get('id')->first()->id,
                    'trip_id' => '1',
                    'seats' => '1',
                    'status' => 'Confirmed',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'user_id' => User::where('email', 'e@e.com')->get('id')->first()->id,
                    'trip_id' => '2',
                    'seats' => '3',
                    'status' => 'Pending',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
            ]
        );
    }
}
