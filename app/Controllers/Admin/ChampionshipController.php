<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TeamModel;

class ChampionshipController extends BaseController {
    public function index() {
        $breadcrumbs[] = [
            'link' => 'admin/',
            'active' => false,
            'text' => 'Home',
        ];

        $breadcrumbs[] = [
            'link' => 'admin/championships',
            'active' => true,
            'text' => 'Campeonatos',
        ];
        
        $teams = (new TeamModel())->findAll();

        $data = [
            'title' => 'Campeonatos',
            'teams' => $teams,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('admin/teams/list', $data);
    }

    public function createTeam() {
        $breadcrumbs[] = [
            'link' => 'admin/',
            'active' => false,
            'text' => 'Home',
        ];

        $breadcrumbs[] = [
            'link' => 'admin/teams',
            'active' => false,
            'text' => 'Equipes',
        ];

        $breadcrumbs[] = [
            'link' => 'admin/teams/edit/',
            'active' => true,
            'text' => 'Nova Equipe',
        ];
        
        $action = base_url('admin/teams/new');

        $data = [
            'title'       => 'Nova Equipe',
            'user'        => [],
            'action'      => $action,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('admin/teams/form', $data);
    }

    public function editTeam($team_id) {
        if (!$team_id) {
            return redirect()->back()->with('error', 'Equipe inválida.');
        }

        $team = (new TeamModel())->find($team_id);

        $breadcrumbs[] = [
            'link' => 'admin/',
            'active' => false,
            'text' => 'Home',
        ];

        $breadcrumbs[] = [
            'link' => 'admin/teams',
            'active' => false,
            'text' => 'Equipes',
        ];

        $breadcrumbs[] = [
            'link' => 'admin/teams/edit/'.$team_id,
            'active' => true,
            'text' => 'Editar Equipe #' . $team['id'] . ' - ' . $team['name'],
        ];
        
        $action = base_url('admin/teams/update/'.$team_id);

        $data = [
            'title'       => 'Editar Equipe #' . $team['id'] . ' - ' . $team['name'],
            'team'        => $team,
            'action'      => $action,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('admin/teams/form', $data);
    }

    public function create() {
        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'logo' => 'if_exist|is_image[logo]|max_size[logo,2048]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $teamModel = new TeamModel();

        $logo = $this->request->getFile('logo');

        $logoPath = null;

        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            $uploadPath = FCPATH . 'uploads/teams';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            
            $newName = $logo->getRandomName();
            $logo->move($uploadPath, $newName);
            $logoPath = 'uploads/teams/' . $newName;
        }

        $data = [
            'name'            => $this->request->getPost('name'),
            'color'           => $this->request->getPost('color'),
            'championship_id' => !empty($this->request->getPost('championship_id')) ? $this->request->getPost('championship_id') : null,
            'logo'            => $logoPath,
        ];

        $teamModel->insert($data);

        return redirect()->to(base_url('admin/teams'))
            ->with('success', 'Equipe criada com sucesso!');
    }

    public function update($team_id) {
        if (!$team_id) {
            return redirect()->back()->with('error', 'Equipe inválida.');
        }

        $teamModel = new TeamModel();
        $team = $teamModel->find($team_id);
        if (!$team) {
            return redirect()->back()->with('error', 'Equipe não encontrada.');
        }

        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'logo' => 'if_exist|is_image[logo]|max_size[logo,2048]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $logo = $this->request->getFile('logo');

        $logoPath = $team['logo'];

        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            $uploadPath = FCPATH . 'uploads/teams';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            if (!empty($team['logo']) && file_exists(FCPATH . $team['logo'])) {
                unlink(FCPATH . $team['logo']);
            }
            
            $newName = $logo->getRandomName();
            $logo->move($uploadPath, $newName);
            $logoPath = 'uploads/teams/' . $newName;
        }

        $data = [
            'name'            => $this->request->getPost('name'),
            'color'           => $this->request->getPost('color'),
            'championship_id' => !empty($this->request->getPost('championship_id')) ? $this->request->getPost('championship_id') : null,
            'logo'            => $logoPath,
        ];
        
        $teamModel->update($team_id, $data);

        return redirect()->to(base_url('admin/teams'))->with('success', 'Equipe atualizada com sucesso!');
    }

    public function delete($id) {
        if (!$id) {
            return redirect()->back()->with('error', 'Usuário inválido.');
        }

        $userModel = new \App\Models\TeamModel();
        $user = $userModel->find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Usuário não encontrado.');
        }

        $userModel->delete($id);

        return redirect()->to(base_url('admin/teams'))->with('success', 'Usuário excluído com sucesso!');
    }
}