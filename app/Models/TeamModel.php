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
}
