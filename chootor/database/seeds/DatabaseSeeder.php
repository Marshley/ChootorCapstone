<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'Mahda',
            'lastname' => 'Harun',
            'school_id' => '000',
            'email' => 'admin@chootor.test',
            'password' => bcrypt('password?'),
            'user_type' => ('admin'),
        ]);
    }
}
