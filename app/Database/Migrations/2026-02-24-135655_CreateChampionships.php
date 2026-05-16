<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateChampionships extends Migration
{
    public function up() {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'logo' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'season' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'kartodrome' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'rounds' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ],
            'points_system_json' => [
                'type' => 'LONGTEXT',
                'null' => TRUE,
            ],
            'enable_fastest_lap' => [
                'type' => 'TINYINT',
                'default' => 0,
            ],
            'fastest_lap_points' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ],
            'status' => [
                'type' => 'TINYINT',
                'default' => 0,
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
        $this->forge->createTable('championships');
    }

    public function down() {
        $this->forge->dropTable('championships');
    }
}
