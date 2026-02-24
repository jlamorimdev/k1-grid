<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserAdminSeed extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'admin',
            'email'    => 'admin@koneracing.com',
            'password' => password_hash('123456', PASSWORD_DEFAULT),
            'role'     => 'admin',
            'status'   => 1,

        ];

        // Simple Queries
        $this->db->query('INSERT INTO users (name, email, password, role, status) VALUES(:name:, :email:, :password:, :role:, :status:)', $data);
    }
}
