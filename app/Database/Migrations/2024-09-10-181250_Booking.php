<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Booking extends Migration
{

    // Create table
    public function up()
    {
        $this->forge->addField([
            'booking_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 150
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'nomor_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'tanggal' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'jam_mulai' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'jam_selesai' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'jenis_lapangan' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ]
        ]);

        $this->forge->addKey('booking_id', true);
        $this->forge->createTable('booking');
    }

    // Remove table take down
    public function down()
    {
        $this->forge->dropTable('booking');
    }
}
