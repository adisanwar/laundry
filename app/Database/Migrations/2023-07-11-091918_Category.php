<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
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
			'deskripsi'      => [
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

		// Membuat tabel category
		$this->forge->createTable('category', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('category');
    }
}
