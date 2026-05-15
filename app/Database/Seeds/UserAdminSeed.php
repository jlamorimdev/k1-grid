<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserAdminSeed extends Seeder
{
    public function run()
    {
        $data = [
            'name'     => 'João Lucas Amorim',
            'username' => 'admin',
            'email'    => 'jlamorimdev@gmail.com',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'role'     => 'admin',
            'status'   => 1,

        ];

        $this->db->query('INSERT INTO users (name, username, email, password, role, status) VALUES(:name:, :username:, :email:, :password:, :role:, :status:)', $data);
    }
}
