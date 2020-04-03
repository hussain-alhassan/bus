<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
    }
}
