<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Laporan extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'username'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'email' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'password'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
            'level'      => [
				'type'           => 'ENUM',
				'constraint'     => ['Admin', 'Pelanggan'],
			],
            
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel lapooran
		$this->forge->createTable('lapooran', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('lapooran');
    }
}
