<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        
        $users = (new UserModel())->findAll();

        $data = [
            'title' => 'Usuários',
            'users' => $users,
        ];

        return view('admin/users/list', $data);
    }
}