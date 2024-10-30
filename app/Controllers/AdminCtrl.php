<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminCtrl extends BaseController
{
    public function index()
    {
        return view('templates/index');
    }
}
