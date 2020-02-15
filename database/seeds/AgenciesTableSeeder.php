<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AgenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agencies')->insert([
                ['name' => 'Rumailah', 'logo' => 'rumailah.png', 'description' => 'This is a description',
                    'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            ]
        );
    }
}
