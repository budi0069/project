<?php

namespace App\Controllers;

use App\Models\DataLaporan;
use App\Models\KelurahanModel;
use App\Models\UsersModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('/masyarakat/index');
    }
    public function tentang()
    {
        return view('/masyarakat/tentang');
    }
    public function lapor()
    {
        $user = new UsersModel();
        $kelurahan = new KelurahanModel();
        //menampilkan nama kelurahan dari id_kelurahan
        $dataKelurahan = $kelurahan->findAll();
        $sessionn = session()->get();
        $nik = session()->get('nik');
        $nama_user = session()->get('nama_user');
        $data = [
            'kelurahan' => $dataKelurahan,
            'nama_user' => $nama_user,
            'nik' => $nik
        ];
        // $data = [
        //     'user' => $user->findAll()
        // ];
        // dd($sessionn);
        return view('/masyarakat/lapor', $data);
    }
    public function login()
    {
        return view('/auth/login');
    }
    public function lastKode()
    {
        $lastkode = $this->data_laporan->getLastKodeLaporan();
        if ($lastkode) {
            $lastnumber = (int)substr($lastkode['kode_laporan'], 2);
            $newNumber = $lastnumber + 1;
            $newKodeLaporan = 'LP' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $newKodeLaporan = 'LP0001';
        }
        return $newKodeLaporan;
    }
    // public function masyarakat_lapor(){
    //     $dataLaporan = new DataLaporan();
    //     if (!$this->validate([
    //         'id_kelurahan' => 'required'
    //     ]))
    //     // mengirim id_user dari session
    //     $data = [
    //         'id_user' => session()->get()['id_user'],
    //         'judul_laporan' => $this->request->getVar('judul_laporan'),
    //         'deskripsi_laporan' => $this->request->getVar('deskripsi_laporan'),
    //         'deskripsi_data_korban' => $this->request->getVar('deskripsi_data_korban'),
    //         'status' => 'belum',
    //         'tanggal_laporan' => $this->request->getVar('tanggal_laporan'),
    //         'id_kelurahan' => $this->request->getVar('id_kelurahan')
    //     ];
    //     $dataLaporan->insert($data);
    //     return redirect()->to('/lapor');
    // }
    public function masyarakat_lapor()
    {
        $dataLaporan = new DataLaporan();
        $kode_laporan = $this->lastKode();
        $data = [
            'kode_laporan' => $kode_laporan,
            'id_user' => session()->get('id_user'),
            'judul_laporan' => $this->request->getVar('judul_laporan'),
            'deskripsi_laporan' => $this->request->getVar('deskripsi_laporan'),
            'deskripsi_data_korban' => $this->request->getVar('deskripsi_data_korban'),
            'id_kelurahan' => $this->request->getVar('id_kelurahan'),
            'status' => 'Menunggu Verifikasi',
            'tanggal_laporan' => $this->request->getVar('tanggal_laporan'),
            'asal_laporan' => 'Kelurahan'
            // 'lokasi_kejadian' => $this->request->getVar('lokasi_kejadian')
        ];
        // dd($data);
        $dataLaporan->insert($data);
        return redirect()->to('masyarakat/laporan_saya');
    }
    public function profil()
    {
        return view('masyarakat/profil');
    }
    public function laporan_saya()
    {
        $laporan = new DataLaporan();
        $userId = session()->get('id_user'); // Ambil id_user dari session

        // Ambil data laporan berdasarkan id_user
        $data['laporan'] = $laporan->where('id_user', $userId)->findAll();

        return view('masyarakat/laporan_saya', $data);
    }
}
