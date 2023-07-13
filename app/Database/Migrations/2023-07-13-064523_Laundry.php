<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Laundry extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true
			],
            'user_id'      => [
				'type'           => 'INT',
				'constraint'     => 11
			],
			'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'no_hp' => [
				'type'           => 'INT',
				'constraint'     => '25'
			],
			'alamat' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'satuan'      => [
				'type'           => 'enum',
				'constraint'     => ['Pakaian Saja', 'Jaket', 'Selimut']
			],
            'hitung_pakaian'      => [
				'type'           => 'enum',
				'constraint'     => ['Kg', 'Pcs']
			],
            'bayar_via'      => [
				'type'           => 'enum',
				'constraint'     => ['Cash']
			],
            'qty' => [
				'type'           => 'INT',
				'constraint'     => '25'
			],
            
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel users
		$this->forge->createTable('laundry', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('laundry');
    }
}
