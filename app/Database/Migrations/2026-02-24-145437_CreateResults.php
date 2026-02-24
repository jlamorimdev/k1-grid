<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateResults extends Migration
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
        
            'race_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
        
            'driver_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
        
            'team_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
        
            'kart_number' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
        
            'grid_position' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
        
            'position' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
        
            'points' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
        
            'best_lap_time' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
        
            'status' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1, // 1 = finished, 2 = DNF, 3 = DSQ
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

        $this->forge->addKey('id', true); // PK

        // Índices para performance (JOIN)
        $this->forge->addKey('race_id');
        $this->forge->addKey('driver_id');
        $this->forge->addKey('team_id');
        
        // UNIQUE regras de negócio
        $this->forge->addKey(['race_id', 'driver_id'], false, true);
        $this->forge->addKey(['race_id', 'kart_number'], false, true);

        $this->forge->addForeignKey( 'race_id', 'races', 'id', 'CASCADE', 'CASCADE' );
        
        $this->forge->addForeignKey( 'driver_id', 'drivers', 'id', 'RESTRICT', 'CASCADE' );
        
        $this->forge->addForeignKey( 'team_id', 'teams', 'id', 'SET NULL', 'CASCADE' );

        $this->forge->createTable('results');

    }

    public function down()
    {
        $this->forge->dropTable('results');
    }
}
