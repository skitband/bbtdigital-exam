<?php

use Illuminate\Database\Seeder;

class PremiumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 100; $i++) { 
	        DB::table('premium')->insert([
	            'email' => Str::random(10).'@gmail.com',
	            'premium' => rand(10000, 100000),
	        ]);
	    }
    }
}
