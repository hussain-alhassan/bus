<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
use App\City;
use App\Agency;
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
                [
                    'name' => 'Mohammed Alali',
                    'email' => 'a@a.com',
                    'password' => '$2y$10$BBuwaLSRytbBtLLTXFoDqeNGhWrMuqWcUxjqSwZlsbH9nO4HGMdIq',
                    'role' => 't',
                    'nationality' => 'Saudi',
                    'gender' => 'Male',
                    'birth_date' => Carbon::createFromFormat('d/m/Y','14/05/1987'),
                    'phone' => '0567136588',
                    'national_id' => '1057198537',
                    'national_id_exp_date' => Carbon::createFromFormat('d/m/Y', '15/02/2025'),
                    'national_id_issuance_city' => 'Hofuf',
                    'passport_id' => 'A548946',
                    'passport_exp_date' => Carbon::createFromFormat('d/m/Y', '01/02/2030'),
                    'passport_issuance_city' => 'Hofuf',
                    'igama_id' => null,
                    'igama_exp_date' => null,
                    'igama_issuance_city' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'name' => 'Nasser Almousa',
                    'email' => 'b@b.com',
                    'password' => '$2y$10$BBuwaLSRytbBtLLTXFoDqeNGhWrMuqWcUxjqSwZlsbH9nO4HGMdIq',
                    'role' => 't',
                    'nationality' => 'Syrian',
                    'gender' => 'Male',
                    'birth_date' => Carbon::createFromFormat('d/m/Y', '20/01/1985'),
                    'phone' => '0567137745',
                    'national_id' => null,
                    'national_id_exp_date' => null,
                    'national_id_issuance_city' => null,
                    'passport_id' => 'F488258',
                    'passport_exp_date' => Carbon::createFromFormat('d/m/Y', '03/08/2027'),
                    'passport_issuance_city' => 'Damascus',
                    'igama_id' => null,
                    'igama_exp_date' => null,
                    'igama_issuance_city' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'name' => 'John Doe',
                    'email' => 'c@c.com',
                    'password' => '$2y$10$BBuwaLSRytbBtLLTXFoDqeNGhWrMuqWcUxjqSwZlsbH9nO4HGMdIq',
                    'role' => 't',
                    'nationality' => 'English',
                    'gender' => 'Male',
                    'birth_date' => Carbon::createFromFormat('d/m/Y', '20/01/1985'),
                    'phone' => '+492154846',
                    'national_id' => null,
                    'national_id_exp_date' => null,
                    'national_id_issuance_city' => null,
                    'passport_id' => 'Y778210',
                    'passport_exp_date' => Carbon::createFromFormat('d/m/Y', '15/02/2025'),
                    'passport_issuance_city' => 'London',
                    'igama_id' => null,
                    'igama_exp_date' => null,
                    'igama_issuance_city' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'name' => 'Sara Ali',
                    'email' => 'd@d.com',
                    'password' => '$2y$10$BBuwaLSRytbBtLLTXFoDqeNGhWrMuqWcUxjqSwZlsbH9nO4HGMdIq',
                    'role' => 't',
                    'nationality' => 'Egyptian',
                    'gender' => 'Female',
                    'birth_date' => Carbon::createFromFormat('d/m/Y', '17/04/1992'),
                    'phone' => '0567138881',
                    'national_id' => null,
                    'national_id_exp_date' => null,
                    'national_id_issuance_city' => null,
                    'passport_id' => null,
                    'passport_exp_date' => null,
                    'passport_issuance_city' => null,
                    'igama_id' => '1101488624',
                    'igama_exp_date' => Carbon::createFromFormat('d/m/Y', '11/12/2024'),
                    'igama_issuance_city' => 'Cairo',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                ['name' => 'Aisah Farouq',
                    'email' => 'e@e.com',
                    'password' => '$2y$10$BBuwaLSRytbBtLLTXFoDqeNGhWrMuqWcUxjqSwZlsbH9nO4HGMdIq',
                    'role' => 't',
                    'nationality' => 'Sudanese',
                    'gender' => 'Female',
                    'birth_date' => Carbon::createFromFormat('d/m/Y', '10/05/1990'),
                    'phone' => '0567247126',
                    'national_id' => null,
                    'national_id_exp_date' => null,
                    'national_id_issuance_city' => null,
                    'passport_id' => null,
                    'passport_exp_date' => null,
                    'passport_issuance_city' => null,
                    'igama_id' => '1101952147',
                    'igama_exp_date' => Carbon::createFromFormat('d/m/Y', '05/11/2022'),
                    'igama_issuance_city' => 'Khartoum',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
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
                    'depart' => Carbon::now()->addDays(7),
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
                    'depart' => Carbon::now()->addDays(2),
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
                    'depart' => Carbon::now()->addDay(),
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
                    'depart' => Carbon::now()->addDays(5),
                    'seats' => '1',
                    'status' => 'Confirmed',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'user_id' => User::where('email', 'e@e.com')->get('id')->first()->id,
                    'from_city_id' => City::where('name', 'الأحساء')->get('id')->first()->id,
                    'to_city_id' => City::where('name', 'دبي')->get('id')->first()->id,
                    'office_id' => Office::where('agency_id', Agency::where('name_en', 'Rumailah')->get('id')->first()->id)->get('id')->first()->id,
                    'depart' => Carbon::now()->addDays(9),
                    'seats' => '3',
                    'status' => 'Pending',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
            ]
        );

        
    }
}
