<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserSubMenu extends Migration
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
			'menu_id' => [
				'type'           => 'INT'
			],
			'title' => [
				'type' => 'VARCHAR',
				'construct' => 128
			],
			'url' => [
				'type' => 'VARCHAR',
				'construct' => 128
			],
			'icon' => [
				'type' => 'VARCHAR',
				'construct' => 128
			],
			'is_active' => [
				'type' => 'INT',
				'construct' => 1
			]
		];
		$this->forge->addField($field);
		$this->forge->addKey('id', true);
		$this->forge->createTable('user_sub_menu');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('user_sub_menu');
	}
}
