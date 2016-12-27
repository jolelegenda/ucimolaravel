<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Televizor LG',
            'user_id' => 1
        ]);
        
        DB::table('products')->insert([
            'name' => 'Givenchy',
            'user_id' => 1
        ]);
        
        DB::table('products')->insert([
            'name' => 'Samsung Galaxy J7',
            'user_id' => 2
        ]);
        DB::table('products')->insert([
            'name' => 'Djevreci sunka',
            'user_id' => 2
        ]);
    }
}
