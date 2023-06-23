<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserHasNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
		DB::table('user_has_news')->insert([
			'user_id' => 1,
            'news_id' => 1,
			'created_at' => now(),
		]);
		DB::table('user_has_news')->insert([
			'user_id' => 1,
            'news_id' => 2,
			'created_at' => now(),
		]);
		DB::table('user_has_news')->insert([
			'user_id' => 1,
            'news_id' => 3,
			'created_at' => now(),
		]);
        DB::table('user_has_news')->insert([
			'user_id' => 1,
            'news_id' => 4,
			'created_at' => now(),
		]);
        DB::table('user_has_news')->insert([
			'user_id' => 1,
            'news_id' => 5,
			'created_at' => now(),
		]);
		DB::table('user_has_news')->insert([
			'user_id' => 2,
            'news_id' => 6,
			'created_at' => now(),
		]);
		DB::table('user_has_news')->insert([
			'user_id' => 2,
            'news_id' => 7,
			'created_at' => now(),
		]);
		DB::table('user_has_news')->insert([
			'user_id' => 2,
            'news_id' => 8,
			'created_at' => now(),
		]);
        DB::table('user_has_news')->insert([
			'user_id' => 2,
            'news_id' => 9,
			'created_at' => now(),
		]);
        DB::table('user_has_news')->insert([
			'user_id' => 2,
            'news_id' => 10,
			'created_at' => now(),
		]);
    }
}
