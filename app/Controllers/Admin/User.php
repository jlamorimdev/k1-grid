<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController {
    public function index() {
        $breadcrumbs[] = [
            'link' => 'admin/',
            'active' => false,
            'text' => 'Home',
        ];

        $breadcrumbs[] = [
            'link' => 'admin/users',
            'active' => true,
            'text' => 'Usuários',
        ];
        
        $users = (new UserModel())->findAll();

        $data = [
            'title' => 'Usuários',
            'users' => $users,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('admin/users/list', $data);
    }

    public function createUser() {
        $breadcrumbs[] = [
            'link' => 'admin/',
            'active' => false,
            'text' => 'Home',
        ];

        $breadcrumbs[] = [
            'link' => 'admin/users',
            'active' => false,
            'text' => 'Usuários',
        ];

        $breadcrumbs[] = [
            'link' => 'admin/users/edit/',
            'active' => true,
            'text' => 'Novo Usuário',
        ];
        
        $action = base_url('admin/users/new');

        $data = [
            'title'       => 'Novo Usuário',
            'user'        => [],
            'action'      => $action,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('admin/users/form', $data);
    }

    public function editUser($user_id) {

        $breadcrumbs[] = [
            'link' => 'admin/',
            'active' => false,
            'text' => 'Home',
        ];

        $breadcrumbs[] = [
            'link' => 'admin/users',
            'active' => false,
            'text' => 'Usuários',
        ];

        $breadcrumbs[] = [
            'link' => 'admin/users/edit/'.$user_id,
            'active' => true,
            'text' => 'Editar Usuário',
        ];
        
        $user = (new UserModel())->find($user_id);

        $action = base_url('admin/users/update/'.$user_id);

        $data = [
            'title'       => 'Editar Usuário #' . $user['id'] . ' - ' . $user['name'],
            'user'        => $user,
            'action'      => $action,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('admin/users/form', $data);
    }

    public function create() {

        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'role' => 'required|in_list[admin,pilot]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $status = $this->request->getPost('status');

        $data = [
            'name'     => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role'),
            'status'   => $status ?? 0,
        ];

        $userModel->insert($data);

        return redirect()->to(base_url('admin/users'))
            ->with('success', 'Usuário criado com sucesso!');
    }

    public function update($id) {
        if (!$id) {
            return redirect()->back()->with('error', 'Usuário inválido.');
        }

        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Usuário não encontrado.');
        }

        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'username' => "required|min_length[3]|max_length[50]|is_unique[users.username,id,{$id}]",
            'email' => "required|valid_email|is_unique[users.email,id,{$id}]",
            'role' => 'required|in_list[admin,pilot]',
        ];

        if ($this->request->getPost('password')) {
            $rules['password'] = 'min_length[6]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $status = $this->request->getPost('status');

        $data = [
            'name'     => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'role'     => $this->request->getPost('role'),
            'status'   => $status ?? 0,
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash( $this->request->getPost('password'), PASSWORD_DEFAULT );
        }
        $userModel->update($id, $data);

        return redirect()->to(base_url('admin/users'))->with('success', 'Usuário atualizado com sucesso!');
    }

    public function delete($id) {
        if (!$id) {
            return redirect()->back()->with('error', 'Usuário inválido.');
        }

        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Usuário não encontrado.');
        }

        $userModel->delete($id);

        return redirect()->to(base_url('admin/users'))->with('success', 'Usuário excluído com sucesso!');
    }
}