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
        DB::table('subjects')->insert([
            'name' => 'Capstone'
        ]);

        DB::table('rates')->insert([
            'min_rate' => '0',
            'max_rate' => '150'
        ]);

        DB::table('locations')->insert([
            'name' => 'Library'
        ]);

        DB::table('courses')->insert([
            'course_name' => 'BS Computer Science'
        ]);

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
