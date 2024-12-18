<?php

namespace App\Models;

use CodeIgniter\Model;

class PelayananModel extends Model
{
    protected $table            = 'pelayanan';
    protected $primaryKey       = 'id_pelayanan';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_pelayanan', 'pelayanan'];

}
