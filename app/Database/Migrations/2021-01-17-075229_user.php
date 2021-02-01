<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		//
		$field = [
			'id' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'name' => [
				'type'           => 'VARCHAR',
				'constraint'     => 128,
			],
			'email' => [
				'type'           => 'VARCHAR',
				'constraint'     => 128,
			],
			'image' => [
				'type'           => 'VARCHAR',
				'constraint'     => 128,
			],
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => 256,
			],
			'role_id' => [
				'type'           => 'VARCHAR',
				'constraint'     => 256,
			],
			'it_active' => [
				'type'           => 'VARCHAR',
				'constraint'     => 1,
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => true
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true
			]
		];
		$this->forge->addField($field);
		$this->forge->addKey('id', true);
		$this->forge->createTable('user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('user');
	}
}
