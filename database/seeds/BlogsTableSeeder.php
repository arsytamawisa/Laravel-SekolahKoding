<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BlogsTableSeeder extends Seeder
{
	public function run()
	{
		$faker = Faker::create();
		for ($i = 0; $i < 10; $i++) {
			DB::table('blogs')->insert([
				'title' => $faker->title,
				'desc' 	=> $faker->address,
			]);
		}
	}
}
