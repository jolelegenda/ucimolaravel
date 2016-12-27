<?php

use Illuminate\Database\Seeder;

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
            'id' => 2,
            'name' => 'Jovan',
            'surname' => 'Jagodic',
            'address' => 'Ustanicka 2',
            'email' => 'impalastudioweb@gmail.com',
            'password' => bcrypt('jovan123'),
        ]);
        
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Dragan',
            'surname' => 'Savic',
            'address' => 'Kumanovska 13',
            'email' => 'savicdragan2707@gmail.com',
            'password' => bcrypt('dragan12'),
        ]);
    }
}
