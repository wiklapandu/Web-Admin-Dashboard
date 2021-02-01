<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserLogSeeder extends Seeder
{
	public function run()
	{
		//
		$data = [
			'role' => 'Member'
		];
		$this->db->table('user_role')->insert($data);
	}
}
