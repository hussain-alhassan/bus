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
                'password' => '$2y$10$BBuwaLSRytbBtLLTXFoDqeNGhWrMuqWcUxjqSwZlsbH9nO4HGMdIq', 'role' => 'a',
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            ['name' => 'Abu Ali', 'email' => 'abu_ali@al-esraa.com',
                'password' => '$2y$10$BBuwaLSRytbBtLLTXFoDqeNGhWrMuqWcUxjqSwZlsbH9nO4HGMdIq', 'role' => 'a',
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
            ['name' => 'Ali Sager', 'email' => 'ali_sager@al-esraa.com',
                'password' => '$2y$10$BBuwaLSRytbBtLLTXFoDqeNGhWrMuqWcUxjqSwZlsbH9nO4HGMdIq', 'role' => 'a',
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ],
        ]
        );
    }
}
