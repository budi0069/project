<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }
    public function loginAction()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $userCheck = new UsersModel();
        $Check = $userCheck->where('username', $username)->first();

        if ($Check) {
            $checkPassword = password_verify($password, $Check['password']);
            if ($checkPassword) {
                $sessionData = [
                    'id_user' => $Check['id_user'],
                    'username' => $Check['username'],
                    'nama_user' => $Check['nama_user'],
                    'nik' => $Check['nik'],
                    'role' => $Check['role'],
                    'logged_in' => TRUE,
                ];
                $session->set($sessionData);
                switch ($Check['role']) {
                    default:
                    session()->setFlashdata('message', 'Login Gagal, Akun Belum Terdaftar!');
                    return redirect()->to('/login');
                    break;
                    case 'dpmppa':
                        return redirect()->to('/admin');
                        break;
                        case 'kelurahan':
                            return redirect()->to('/admin');
                            break;
                            case 'masyarakat':
                            // dd($sessionData);
    
                        return redirect()->to('/');
                        break;
                        // if ($session->get('role') === 'dpmppa') {
                        //     return redirect()->to('/admin');
                        // } else {
                        //     return redirect()->to('/');
                }
            } else {
                session()->setFlashdata('message', 'Username atau Password Salah!');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('message', 'Username atau Password Salah!');
            return redirect()->to('/login');
        }
    }
    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
