<?php

use Illuminate\Database\Seeder;
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
                    'password' => '$2y$10$iLa85Bayb08SZmkRmo9U3.cucmp5XqyEGNUfN4tGxlMWkKwB41HYi', 'role' => 's'],

            ['name' => 'Basil', 'email' => 'alrashedbasil@gmail.com',
                    'password' => '$2y$10$g.rhuJl0GC9kqlvnFYJsv.kY0OruQc/bkOnwaTZ7x074xGsapANsK', 'role' => 's']
        ]
        );
    }
}
