<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Order extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'customer_id'    => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'paket_laundry'  => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'jenis'  => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'qty'  => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'berat'  => [
                'type'       => 'INT',
                'constraint' => 100,
                'null'       => false,
            ],
            'harga'  => [
                'type'       => 'INT',
                'constraint' => 100,
                'null'       => false,
            ],
            'pembayaran'  => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'total'  => [
                'type'       => 'INT',
                'constraint' => 100,
                'null'       => false,
            ],
            'status'  => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
