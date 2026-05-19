<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table            = 'teams';
    protected $primaryKey       = 'id';
    protected $useSoftDeletes   = true;

    protected $useTimestamps = true;
    protected $allowedFields = [
        'name',
        'championship_id',
        'color',
        'logo'
    ];

    public function getTeams() {
        $teams = $this
            ->select('teams.*, championships.name AS championship_name')
            ->join('championships', 'championships.id = teams.championship_id', 'LEFT')
            ->orderBy('teams.name', 'ASC')
            ->findAll();

        return $teams;
    }
}
