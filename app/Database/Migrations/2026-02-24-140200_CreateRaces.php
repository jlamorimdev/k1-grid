<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRaces extends Migration
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
            'championship_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'track_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'race_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('championship_id');
        $this->forge->addForeignKey('championship_id', 'championships', 'id', 'RESTRICT', 'CASCADE');

        $this->forge->createTable('races');
    }

    public function down()
    {
        $this->forge->dropTable('races');
    }
}
