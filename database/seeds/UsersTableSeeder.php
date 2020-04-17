<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Hussain', 'email' => 'e.alhassan.h@gmail.com',
                'password' => bcrypt('secretHa'), 'role' => 's',
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
            ],
            ['name' => 'Basil', 'email' => 'alrashedbasil@gmail.com',
                'password' => bcrypt('secretBa'), 'role' => 's',
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
            ],
            ['name' => 'Abu aqeel', 'email' => 'abu_aqeel@rumailah.com',
                'password' => bcrypt('secret'), 'role' => 'a',
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            ['name' => 'Abu Ali', 'email' => 'abu_ali@al-esraa.com',
                'password' => bcrypt('secret'), 'role' => 'a',
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            ['name' => 'Ali Sager', 'email' => 'ali_sager@al-esraa.com',
                'password' => bcrypt('secret'), 'role' => 'a',
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
        ]
        );

        // travelers
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
    }
}
