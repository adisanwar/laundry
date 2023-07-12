<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Antrian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'date' => [
                'type'       => 'date',
            ],
            'selesai' => [
                'type' => 'timestamp',
                'null' => true,
            ],
            'ambil' => [
                'type'       => 'timestamp',
                'null'       => true,
            ],
            'pembayaran' => [
                'type' => 'enum',
                'constraint'     => ['Pending','Selesai'],
            ],
            'operator' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'status' => [
                'type'      => 'enum',
                'constraint'     => ['hold','cuci', 'selesai'],
            ],
        ]);
        $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('depart_id', 'departments', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('antrian');
    }

    public function down()
    {
        $this->forge->dropTable('antrian');
    }
}
