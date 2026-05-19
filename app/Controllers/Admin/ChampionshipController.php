<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ChampionshipModel;
use App\Models\TeamModel;

class ChampionshipController extends BaseController {

    private $championshipModel;

    public function __construct() {
        $this->championshipModel = new ChampionshipModel();
    }

    public function index() {
        $breadcrumbs[] = [
            'link' => 'admin/',
            'active' => false,
            'text' => 'Home',
        ];

        $breadcrumbs[] = [
            'link' => '',
            'active' => true,
            'text' => 'Campeonatos',
        ];
        
        $championships = $this->championshipModel->findAll();

        $data = [
            'title'         => 'Campeonatos',
            'championships' => $championships,
            'breadcrumbs'   => $breadcrumbs,
        ];

        return view('admin/championships/list', $data);
    }

    public function createChampionship() {
        $breadcrumbs[] = [
            'link' => 'admin/',
            'active' => false,
            'text' => 'Home',
        ];

        $breadcrumbs[] = [
            'link' => 'admin/championships',
            'active' => false,
            'text' => 'Campeonatos',
        ];

        $breadcrumbs[] = [
            'link' => '',
            'active' => true,
            'text' => 'Novo Campeonato',
        ];
        
        $action = base_url('admin/championships/new');

        $data = [
            'title'       => 'Novo Campeonato',
            'user'        => [],
            'action'      => $action,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('admin/championships/form', $data);
    }

    public function editChampionship($championship_id) {
        if (!$championship_id) {
            return redirect()->back()->with('error', 'Campeonato inválido.');
        }

        $championship = $this->championshipModel->find($championship_id);

        $breadcrumbs[] = [
            'link'   => 'admin/',
            'active' => false,
            'text'   => 'Home',
        ];

        $breadcrumbs[] = [
            'link'   => 'admin/teams',
            'active' => false,
            'text'   => 'Campeonatos',
        ];

        $breadcrumbs[] = [
            'link'   => null,
            'active' => true,
            'text'   => 'Editar Campeonato #' . $championship['id'] . ' - ' . $championship['name'],
        ];
        
        $action = base_url('admin/championships/update/'.$championship_id);

        $data = [
            'title'       => 'Editar Campeonato #' . $championship['id'] . ' - ' . $championship['name'],
            'championship'        => $championship,
            'action'      => $action,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('admin/championships/info', $data);
    }

    public function create() {
        $rules = [
            'name'          => 'required|min_length[1]|max_length[100]',
            'kartodrome'    => 'required|min_length[1]',
            'logo'          => 'if_exist|is_image[logo]|max_size[logo,2048]',
            'points_system' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $logo = $this->request->getFile('logo');

        $logoPath = null;

        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            $uploadPath = FCPATH . 'uploads/championships';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            
            $newName = $logo->getRandomName();
            $logo->move($uploadPath, $newName);
            $logoPath = 'uploads/championships/' . $newName;
        }

        $data = [
            'name'               => $this->request->getPost('name'),
            'kartodrome'         => $this->request->getPost('kartodrome'),
            'season'             => $this->request->getPost('season'),
            'rounds'             => $this->request->getPost('rounds'),
            'pilot_max'          => $this->request->getPost('pilot_max'),
            'team_max'           => $this->request->getPost('team_max'),
            'enable_fastest_lap' => $this->request->getPost('enable_fastest_lap') ?? 0,
            'fastest_lap_points' => $this->request->getPost('fastest_lap_points') ?? 0,
            'points_system_json' => !empty($this->request->getPost('points_system')) ? json_encode($this->request->getPost('points_system')) : null,
            'logo'               => $logoPath,
        ];
        
        $this->championshipModel->insert($data);

        return redirect()->to(base_url('admin/championships'))->with('success', 'Campeonato criado com sucesso!');
    }

    public function update($championship_id) {
        if (!$championship_id) {
            return redirect()->back()->with('error', 'Equipe inválida.');
        }

        $championship = $this->championshipModel->find($championship_id);
        if (!$championship) {
            return redirect()->back()->with('error', 'Equipe não encontrada.');
        }

        $rules = [
            'name'          => 'required|min_length[1]|max_length[100]',
            'kartodrome'    => 'required|min_length[1]',
            'logo'          => 'if_exist|is_image[logo]|max_size[logo,2048]',
            'points_system' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $logo = $this->request->getFile('logo');

        $logoPath = $championship['logo'];

        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            $uploadPath = FCPATH . 'uploads/championships';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            if (!empty($team['logo']) && file_exists(FCPATH . $team['logo'])) {
                unlink(FCPATH . $team['logo']);
            }
            
            $newName = $logo->getRandomName();
            $logo->move($uploadPath, $newName);
            $logoPath = 'uploads/championship/' . $newName;
        }

        $data = [
            'name'               => $this->request->getPost('name'),
            'kartodrome'         => $this->request->getPost('kartodrome'),
            'season'             => $this->request->getPost('season'),
            'rounds'             => $this->request->getPost('rounds'),
            'pilot_max'          => $this->request->getPost('pilot_max'),
            'team_max'           => $this->request->getPost('team_max'),
            'enable_fastest_lap' => $this->request->getPost('enable_fastest_lap') ?? 0,
            'fastest_lap_points' => $this->request->getPost('fastest_lap_points') ?? 0,
            'points_system_json' => !empty($this->request->getPost('points_system')) ? json_encode($this->request->getPost('points_system')) : null,
            'logo'               => $logoPath,
        ];
        
        $this->championshipModel->update($championship_id, $data);

        return redirect()->to(base_url('admin/championships'))->with('success', 'Campeonato atualizado com sucesso!');
    }

    public function delete($id) {
        if (!$id) {
            return redirect()->back()->with('error', 'Campeonato inválido.');
        }

        $user = $this->championshipModel->find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Campeonato não encontrado.');
        }

        $this->championshipModel->delete($id);

        return redirect()->to(base_url('admin/championships'))->with('success', 'Campeonato excluído com sucesso!');
    }
}