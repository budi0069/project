<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataLaporan;
use App\Models\KelurahanModel;
use App\Models\PenugasanModel;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminCtrl extends BaseController
{
    public function index()
    {
        return view('admin/dashboard');
    }
    public function data_laporan()
    {
        $kelurahan = new KelurahanModel();
        $user = new UsersModel();
        $laporan = new DataLaporan();
        $filteredLaporan = $laporan->whereIn('status', ['terverifikasi', 'belum', 'proses', 'penugasan'])->findAll();
        $data = [];
        foreach ($filteredLaporan as $key => $value) {
            $data[$key]['kode_laporan'] = $value['kode_laporan'];
            $data[$key]['id_user'] = $value['id_user'];
            $data[$key]['id_kelurahan'] = $value['id_kelurahan'];
            $data[$key]['judul_laporan'] = $value['judul_laporan'];
            $data[$key]['deskripsi_laporan'] = $value['deskripsi_laporan'];
            $data[$key]['deskripsi_data_korban'] = $value['deskripsi_data_korban'];
            $data[$key]['status'] = $value['status'];
            $data[$key]['tanggal_laporan'] = $value['tanggal_laporan'];
            // $data[$key]['lokasi_kejadian'] = $value['lokasi_kejadian'];
            $data[$key]['nama_user'] = $user->where('id_user', $value['id_user'])->first()['nama_user'];
            $data[$key]['nama_kelurahan'] = $kelurahan->where('id_kelurahan', $value['id_kelurahan'])->first()['nama_kelurahan'];
        }
        $data = [
            'data' => $data
        ];
        // dd($data);
        return view('admin/data_laporan', $data);
    }
    public function tampilForm()
    {
        // Generate kode laporan otomatis
        $kodeLaporan = $this->lastKode();
        $kelurahan = new KelurahanModel();
        $user = new UsersModel();
        $data = [
            'kode_laporan' => $kodeLaporan,
            'kelurahan' => $kelurahan->findAll(),
            'user' => $user->findAll()
        ];
        // dd($data);
        return view('admin/tambahLaporan', $data);
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
    public function tambahLaporan()
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
            'status' => 'belum',
            'tanggal_laporan' => $this->request->getVar('tanggal_laporan'),
            // 'lokasi_kejadian' => $this->request->getVar('lokasi_kejadian')
        ];
        // dd($data);
        $dataLaporan->insert($data);
        return redirect()->to('admin/data_laporan');
    }
    public function deleteLaporan($kode_laporan)
    {
        $dataLaporan = new DataLaporan();
        $laporan = $dataLaporan->find($kode_laporan);
        if ($laporan) {
            $dataLaporan->delete($kode_laporan);
            return redirect()->to('/admin/data_laporan')->with('message', 'Data laporan berhasil dihapus');
        } else {
            return redirect()->to('/admin/data_laporan')->with('message', 'Data tidak ditemukan');
        }
    }
    public function editLaporan($kode_laporan)
    {
        $dataLaporan = new DataLaporan();
        $user = new UsersModel();
        //menampilkan nama user dari id_user
        $dataUser = $user->find($dataLaporan->find($kode_laporan)['id_user']);
        // menampilkan nama kelurahan dari id_kelurahan
        $dataKelurahan = $dataLaporan->find($kode_laporan);
        $data = [
            'data' => $dataLaporan->find($kode_laporan),
            'user' => $dataUser,
            'kelurahan' => $dataKelurahan
        ];
        // dd($data);
        return view('/admin/editLaporan', $data);
    }

    public function update($kode_laporan)
    {

        $data = [
            'status' => $this->request->getVar('status'),
        ];
        // Lakukan update pada data yang sesuai
        $dataUpdate = $this->data_laporan->update($kode_laporan, $data);
        // dd($dataUpdate);
        return redirect()->to('/admin/data_laporan/detail/' . $kode_laporan);
        // Optional: Redirect atau berikan respons sukses setelah update
    }
    public function detail($kode_laporan)
    {
        $dataLaporan = new DataLaporan();
        $kelurahan = new KelurahanModel();
        $user = new UsersModel();
        //menampilkan nama user dari id_user
        $dataUser = $user->find($dataLaporan->find($kode_laporan)['id_user']);
        // menampilkan nama kelurahan dari id_kelurahan pake ini 
        $dataKelurahan = $kelurahan->find($dataLaporan->find($kode_laporan)['id_kelurahan']);
        $data = [
            'data' => $dataLaporan->find($kode_laporan),
            'kelurahan' => $dataKelurahan,
            'user' => $dataUser
        ];
        // dd($data);
        return view('/admin/detail', $data);
    }
    public function penugasan() {
        $penugasan = new PenugasanModel();
        $laporan = new DataLaporan();
        $kelurahan = new KelurahanModel();
        $user = new UsersModel();
        $laporan = new DataLaporan();
        $filteredLaporan = $laporan->whereIn('status', ['penugasan'])->findAll();
        $data = [];
        foreach ($filteredLaporan as $key => $value) {
            $data[$key]['kode_laporan'] = $value['kode_laporan'];
            $data[$key]['id_user'] = $value['id_user'];
            $data[$key]['id_kelurahan'] = $value['id_kelurahan'];
            $data[$key]['judul_laporan'] = $value['judul_laporan'];
            $data[$key]['status'] = $value['status'];
            $data[$key]['nama_user'] = $user->where('id_user', $value['id_user'])->first()['nama_user'];
            $data[$key]['nama_kelurahan'] = $kelurahan->where('id_kelurahan', $value['id_kelurahan'])->first()['nama_kelurahan'];
            $data[$key]['tanggal_penugasan'] = $penugasan->where('kode_laporan', $value['kode_laporan'])->first()['tanggal_penugasan'];
        }
        $data = [
            'data' => $data
        ];
        
        return view('/admin/penugasan', $data);
    }
    
    public function kirimPenugasan($kode_laporan)
    {
        $dataLaporan = new DataLaporan();
        $penugasanLaporan = new PenugasanModel();

        $kode_laporan = $dataLaporan->where('kode_laporan', $kode_laporan)->first();

        if ($kode_laporan) {
            //     return redirect()->to('/admin/data_laporan')->with('error', 'Laporan tidak ditemukan!');
            // }

            // // Tambahkan data ke tabel penugasan
            // $dataPenugasan = [
            //     'kode_laporan' => $kode_laporan,
            //     'tanggal_penugasan' => date('Y-m-d H:i:s'),
            //     'petugas_penugasan' => 'Admin DPMPPA', // Bisa diisi dinamis
            // dd($kode_laporan);
            // $penugasanLaporan->insert([
            //     'kode_laporan' => $data['kode_laporan'],
            //     'id_user' => $data['id_user'],
            //     'petugas_penugasan' => $data['id_kelurahan'],
            //     'tanggal_penugasan' => date('Y-m-d H:i:s'),
            // ]);
            // Update data status dari tabel laporan
            $dataLaporan->update($kode_laporan['kode_laporan'], [
                'status' => 'penugasan',
            ]);
            // tambah data ke tabel penugasan
            $penugasanLaporan->insert([
                'kode_laporan' => $kode_laporan['kode_laporan'],
                'tanggal_penugasan' => date('Y-m-d'),
            ]);
            // Redirect dengan pesan sukses
            return redirect()->to('/admin/penugasan')->with('success', 'Laporan berhasil ditugaskan!');
        }
        return redirect()->to('/admin/data_laporan')->with('error', 'Laporan tidak ditemukan!');
    }
    public function Notifikasi()
    {
        $laporan = new DataLaporan();
        $user = new UsersModel();
        $kelurahan = new KelurahanModel();

        //menampilkan laporan dengan status baru
        $verifikasi = $laporan->where('status', 'baru');
        $data = [];
        foreach ($verifikasi->findAll() as $key => $value) {
            $data[$key]['kode_laporan'] = $value['kode_laporan'];
            $data[$key]['id_user'] = $value['id_user'];
            $data[$key]['id_kelurahan'] = $value['id_kelurahan'];
            $data[$key]['judul_laporan'] = $value['judul_laporan'];
            $data[$key]['status'] = $value['status'];
            $data[$key]['tanggal_laporan'] = $value['tanggal_laporan'];
            // $data[$key]['lokasi_kejadian'] = $value['lokasi_kejadian'];
            $data[$key]['nama_user'] = $user->where('id_user', $value['id_user'])->first()['nama_user'];
            $data[$key]['nama_kelurahan'] = $kelurahan->where('id_kelurahan', $value['id_kelurahan'])->first()['nama_kelurahan'];
        }
        // dd($data);
        // $data['notifikasi'] = $this->$laporan->getNewReports();
        $data = [
            'data' => $data
        ];
        return view('admin/notifikasi', $data);
    }
    public function detailNotifikasi($kode_laporan)
    {
        $laporan = new DataLaporan();
        $user = new UsersModel();
        $kelurahan = new KelurahanModel();
        $data = $laporan->find($kode_laporan);
        //menampilkan nama user dari id_user
        $User = $user->find($laporan->find($kode_laporan)['id_user']);
        // menampilkan nama kelurahan dari id_kelurahan pake ini 
        $dataKelurahan = $kelurahan->find($laporan->find($kode_laporan)['id_kelurahan']);
        $data = [
            'data' => $data,
            'user' => $User,
            'kelurahan' => $dataKelurahan
        ];
        // dd($data);
        return view('admin/detailnotif', $data);
    }
    public function verifikasi($kode_laporan)
    {
        $laporan = new DataLaporan();
        $laporan->update($kode_laporan, ['status' => 'terverifikasi']);
        return redirect()->to('/admin/notifikasi')->with('message', 'Laporan berhasil diverifikasi!');
    }
    public function tolak($kode_laporan)
    {
        $kode_laporan = $this->request->getPost('kode_laporan');
        $alasan = $this->request->getPost('alasan');
        $laporan = new DataLaporan();
        $laporan->update($kode_laporan, [
            'status' => 'ditolak',
            'alasan' => $alasan
        ]);
        return redirect()->to('/admin/notifikasi')->with('message', 'Laporan berhasil ditolak!');
    }
    public function laporan()
    {
        $laporan = new DataLaporan();
        $user = new UsersModel();
        $kelurahan = new KelurahanModel();
        $selesai = $laporan->where('status', 'selesai');
        $data = [];
        foreach ($selesai->findAll() as $key => $value) {
            $data[$key]['kode_laporan'] = $value['kode_laporan'];
            $data[$key]['id_user'] = $value['id_user'];
            $data[$key]['id_kelurahan'] = $value['id_kelurahan'];
            $data[$key]['judul_laporan'] = $value['judul_laporan'];
            $data[$key]['status'] = $value['status'];
            $data[$key]['tanggal_laporan'] = $value['tanggal_laporan'];
            $data[$key]['nama_user'] = $user->where('id_user', $value['id_user'])->first()['nama_user'];
            $data[$key]['nama_kelurahan'] = $kelurahan->where('id_kelurahan', $value['id_kelurahan'])->first()['nama_kelurahan'];
        }
        $data = [
            'data' => $data
        ];
        return view('admin/laporan', $data);
    }
    public function proses($kode_laporan)
    {
        
        $dataLaporan = new DataLaporan();
        $penugasanLaporan = new PenugasanModel();

        $kode_laporan = $dataLaporan->where('kode_laporan', $kode_laporan)->first();

        if ($kode_laporan) {
            $dataLaporan->update($kode_laporan['kode_laporan'], [
                'status' => 'proses',
            ]);
            // tambah data ke tabel penugasan
            // $penugasanLaporan->insert([
            //     'kode_laporan' => $kode_laporan['kode_laporan'],
            //     'tanggal_penugasan' => date('Y-m-d'),
            // ]);
            // Redirect dengan pesan sukses
            return redirect()->to('/admin/data_laporan')->with('success', 'Laporan berhasil ditugaskan!');
        }
        return redirect()->to('/admin/data_laporan')->with('error', 'Laporan tidak ditemukan!');
    }
}