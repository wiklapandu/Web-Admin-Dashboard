<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		//
		$faker = \Faker\Factory::create('id_ID');
		for ($i = 0; $i < 60; $i++) :
			$data = [
				'name' => $faker->name,
				'image' => 'default.jpg',
				'email'    => $faker->email,
				'role_id' => 2,
				'it_active' => 0,
				'password' => password_hash('panduwanso', PASSWORD_DEFAULT)
			];

			// Using Query Builder
			$this->db->table('user')->insert($data);
		endfor;
	}
}
