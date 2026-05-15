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
        'status',
    ];
}
