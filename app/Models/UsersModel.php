<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id_user';
    protected $allowedFields    = ['username','nik','nama_user','password','role','jenis_kelamin'];
}
