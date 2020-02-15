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
                'password' => '$2y$10$iLa85Bayb08SZmkRmo9U3.cucmp5XqyEGNUfN4tGxlMWkKwB41HYi', 'role' => 's',
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
            ],
            ['name' => 'Basil', 'email' => 'alrashedbasil@gmail.com',
                'password' => '$2y$10$g.rhuJl0GC9kqlvnFYJsv.kY0OruQc/bkOnwaTZ7x074xGsapANsK', 'role' => 's',
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
            ],
            ['name' => 'Abu aqeel', 'email' => 'abu_aqeel@rumailah.com',
                'password' => '$2y$10$XQmmjTzkVZJ6xQzDviNmpOtIoIq0NuTSzN30oQ1jFSjH1B6O203ty', 'role' => 'a',
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            ['name' => 'Ahmad', 'email' => 'ahmad@traveler.com',
                'password' => '$2y$10$XQmmjTzkVZJ6xQzDviNmpOtIoIq0NuTSzN30oQ1jFSjH1B6O203ty', 'role' => 't',
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
        ]
        );
    }
}
