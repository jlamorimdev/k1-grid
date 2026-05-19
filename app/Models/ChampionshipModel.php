<?php

namespace App\Models;

use CodeIgniter\Model;

class ChampionshipModel extends Model
{
    protected $table            = 'championships';
    protected $primaryKey       = 'id';
    protected $useSoftDeletes   = true;

    protected $useTimestamps = true;
    protected $allowedFields = [
        'name',
        'season',
        'logo',
        'kartodrome',
        'pilot_max',
        'team_max',
        'rounds',
        'points_system_json',
        'enable_fastest_lap',
        'fastest_lap_points',
        'status',
    ];
}
