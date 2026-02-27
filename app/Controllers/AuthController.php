<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function authenticate()
    {
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)
                      ->where('status', 1)
                      ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Usuário não encontrado');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Senha inválida');
        }

        session()->set([
            'user_id' => $user['id'],
            'user_name' => $user['name'],
            'role' => $user['role'],
            'isLoggedIn' => true
        ]);

        return redirect()->to('/admin');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}