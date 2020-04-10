<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
use App\City;
use App\Office;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // traveler
        DB::table('users')->insert([
                ['name' => 'Mohammed Alali', 'email' => 'a@a.com',
                    'password' => '$2y$10$BBuwaLSRytbBtLLTXFoDqeNGhWrMuqWcUxjqSwZlsbH9nO4HGMdIq', 'role' => 't',
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ],
                ['name' => 'Nasser Almousa', 'email' => 'b@b.com',
                    'password' => '$2y$10$BBuwaLSRytbBtLLTXFoDqeNGhWrMuqWcUxjqSwZlsbH9nO4HGMdIq', 'role' => 't',
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ],
                ['name' => 'John Doe', 'email' => 'c@c.com',
                    'password' => '$2y$10$BBuwaLSRytbBtLLTXFoDqeNGhWrMuqWcUxjqSwZlsbH9nO4HGMdIq', 'role' => 't',
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ],
                ['name' => 'Sara Ali', 'email' => 'd@d.com',
                    'password' => '$2y$10$BBuwaLSRytbBtLLTXFoDqeNGhWrMuqWcUxjqSwZlsbH9nO4HGMdIq', 'role' => 't',
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ],
                ['name' => 'Aisah Farouq', 'email' => 'e@e.com',
                    'password' => '$2y$10$BBuwaLSRytbBtLLTXFoDqeNGhWrMuqWcUxjqSwZlsbH9nO4HGMdIq', 'role' => 't',
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                ],
            ]
        );

        //Bookings
        DB::table('bookings')->insert([
                [
                    'user_id' => User::where('email', 'a@a.com')->get('id')->first()->id,
                    'from_city_id' => City::where('name', 'الأحساء')->get('id')->first()->id,
                    'to_city_id' => City::where('name', 'دبي')->get('id')->first()->id,
                    'office_id' => Office::where('agency_id', Agency::where('name_en', 'Rumailah')->get('id')->first()->id)->get('id')->first()->id,
                    'depart' => Carbon::next(7),
                    'seats' => '1',
                    'status' => 'Confirmed',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'user_id' => User::where('email', 'b@b.com')->get('id')->first()->id,
                    'from_city_id' => City::where('name', 'الأحساء')->get('id')->first()->id,
                    'to_city_id' => City::where('name', 'دبي')->get('id')->first()->id,
                    'office_id' => Office::where('agency_id', Agency::where('name_en', 'Rumailah')->get('id')->first()->id)->get('id')->first()->id,
                    'depart' => Carbon::next(2),
                    'seats' => '1',
                    'status' => 'Pending',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'user_id' => User::where('email', 'c@c.com')->get('id')->first()->id,
                    'from_city_id' => City::where('name', 'الأحساء')->get('id')->first()->id,
                    'to_city_id' => City::where('name', 'دبي')->get('id')->first()->id,
                    'office_id' => Office::where('agency_id', Agency::where('name_en', 'Rumailah')->get('id')->first()->id)->get('id')->first()->id,
                    'depart' => Carbon::next(1),
                    'seats' => '1',
                    'status' => 'Rejected',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'user_id' => User::where('email', 'd@d.com')->get('id')->first()->id,
                    'from_city_id' => City::where('name', 'الأحساء')->get('id')->first()->id,
                    'to_city_id' => City::where('name', 'دبي')->get('id')->first()->id,
                    'office_id' => Office::where('agency_id', Agency::where('name_en', 'Rumailah')->get('id')->first()->id)->get('id')->first()->id,
                    'depart' => Carbon::next(5),
                    'seats' => '1',
                    'status' => 'Confiremed',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'user_id' => User::where('email', 'e@e.com')->get('id')->first()->id,
                    'from_city_id' => City::where('name', 'الأحساء')->get('id')->first()->id,
                    'to_city_id' => City::where('name', 'دبي')->get('id')->first()->id,
                    'office_id' => Office::where('agency_id', Agency::where('name_en', 'Rumailah')->get('id')->first()->id)->get('id')->first()->id,
                    'depart' => Carbon::next(9),
                    'seats' => '3',
                    'status' => 'Pending',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
            ]
        );

        
    }
}
