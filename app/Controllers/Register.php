<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class Register extends BaseController
{
    public function index()
    {
        return view('auth/register');
    }
    public function process()
    {
        if(!$this->validate([
            'nik' => [
                'rules' => 'required|numeric|min_length[16]|max_length[16]|is_unique[users.nik]',
                'errors' => [
                    'required' => 'NIK harus diisi.',
                    'numeric' => 'NIK harus angka.',
                    'min_length' => 'NIK minimal 16 karakter.',
                    'max_length' => 'NIK maksimal 16 karakter.',
                    'is_unique' => 'NIK sudah terdaftar.'
                ]
            ],
            'nama_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.'
                ]
                ],
                // 'tempat_tinggal' => [
                //     'rules' => 'required',
                //     'errors' => [
                //         'required' => 'Tempat tinggal harus diisi.'
                //     ]
                //     ],
                //     'tanggal_lahir' => [
                //         'rules' => 'required',
                //         'errors' => [
                //             'required' => 'Tanggal lahir harus diisi.'
                //         ]
                //         ],
                        'jenis_kelamin' => [
                            'rules' => 'required',
                            'errors' => [
                                'required' => 'Jenis kelamin harus diisi.'
                            ]
                            ],
            'username' => [
                'rules' => 'required|min_length[5]|max_length[20]|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'min_length' => 'Username minimal 5 karakter.',
                    'max_length' => 'Username maksimal 20 karakter.',
                    'is_unique' => 'Username sudah terdaftar.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password minimal 8 karakter.'
                ]
            ],
            'password_confirm' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi password tidak sesuai dengan password.'
                ]
            ]
                ])){
                    session()->setFlashdata('error', $this->validator->listErrors());
                    return redirect()->back()->withInput();
                }
                $users = new UsersModel();
                $users->insert([
                    'nik' => $this->request->getPost('nik'),
                    'nama_user' => $this->request->getPost('nama_user'),
                    // 'tempat_tinggal' => $this->request->getPost('tempat_tinggal'),
                    // 'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'username' => $this->request->getPost('username'),
                    'password' => password_hash($this->request->getVar('password'),PASSWORD_BCRYPT),
                    'role' => 'masyarakat'
                ]);
                return redirect()->to('/login')->with('message', 'Registrasi Berhasil!')->with('message_type', 'success');
    }
}
