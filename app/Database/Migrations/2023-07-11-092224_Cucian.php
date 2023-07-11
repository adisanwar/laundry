<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cucian extends Migration
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
			'antrian_id'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'category_id'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'satuan' => [
				'type'           => 'Enum',
				'constraint'     => ['Kg','Pcs'],
			],
			'harga'      => [
				'type'           => 'INT',
				'constraint'     => '255'
			],
            
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel cucian
		$this->forge->createTable('cucian', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('cucian');
    }
}
