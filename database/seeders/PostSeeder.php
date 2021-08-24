<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Socialism Republic of Vietnam',
            'description' => 'Description of Vietnam'
        ]);
        DB::table('posts')->insert([
            'title' => 'Population Republic of China',
            'description' => 'Description of China'
        ]);
        DB::table('posts')->insert([
            'title' => 'United States of America',
            'description' => 'Description of The US'
        ]);
    }
}
