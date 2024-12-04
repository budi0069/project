<?php

namespace App\Models;

use CodeIgniter\Model;

class PenugasanModel extends Model
{
    protected $table            = 'penugasan';
    protected $primaryKey       = 'id_penugasan';
    protected $allowedFields    = ['id_user', 'kode_laporan', 'tanggal_penugasan', 'id_kelurahan'];

   
    
}
