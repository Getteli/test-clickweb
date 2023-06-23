<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
		DB::table('users')->insert([
			'name' => "Fulano da Silva",
            'email' => "fulano_silva@gmail.com",
            "sobre" => "Fulano da silva é um autor de blogs. Formado pela faculdade UniverXYZ, etc...",
            'password' => password_hash("teste_clickweb", PASSWORD_DEFAULT), // apenas para teste
			'created_at' => now(),
		]);

		DB::table('users')->insert([
			'name' => "Beltrana Ramiro",
            'email' => "ramiro_beltrana@gmail.com",
            "sobre" => "Beltrana é formada internacionalmente, criadora da plataforma X, especialista em agronegocio..",
            'password' => password_hash("teste_clickweb", PASSWORD_DEFAULT), // apenas para teste
			'created_at' => now(),
		]);
    }
}
