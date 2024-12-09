<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class KelurahanCtrl extends BaseController
{
    public function index()
    {
        return view('kelurahan/dashboard');
    }
    public function notifikasi()
    {
        return view('kelurahan/notifikasi');
    }
    public function data_laporan()
    {
        return view('kelurahan/data_laporan');
    }
    public function rujukan()
    {
        return view('kelurahan/rujukan');
    }
    public function laporan()
    {
        return view('kelurahan/laporan');
    }
}
