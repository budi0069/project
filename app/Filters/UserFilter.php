<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class UserFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->get('logged_in')){
            session()->setFlashdata('message','Anda Belum Login');
            return redirect()->to('/login');
        }
        if(session()->get('role') !='masyarakat'){
            session()->setFlashdata('message','Anda Tidak Memiliki Akses!');
            return redirect()->back();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}