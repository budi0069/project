<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataLaporan;
use App\Models\KelurahanModel;
use App\Models\PelayananModel;
use App\Models\UsersModel;
use App\Models\PenugasanModel;
use CodeIgniter\HTTP\ResponseInterface;

class KelurahanCtrl extends BaseController
{
    public function index()
    {
        return view('kelurahan/dashboard');
    }
    public function notifikasi()
    {
        $laporan = new DataLaporan();
        $user = new UsersModel();
        $kelurahan = new KelurahanModel();

        //menampilkan laporan dengan status baru
        $verifikasi = $laporan->whereIn('status', ['Menunggu Verifikasi','Penugasan ke Kelurahan']);
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
        return view('kelurahan/notifikasi', $data);
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
        return view('kelurahan/detailnotif', $data);
    }
    public function verifikasi($kode_laporan)
    {
        $laporan = new DataLaporan();
        $laporan->update($kode_laporan, ['status' => 'Terverifikasi']);
        return redirect()->to('/admin_kelurahan/notifikasi')->with('message', 'Laporan berhasil diverifikasi!');
    }
    public function data_laporan()
    {
        $kelurahan = new KelurahanModel();
        $user = new UsersModel();
        $laporan = new DataLaporan();
        $layanan = new PelayananModel();
        $filteredLaporan = $laporan->whereIn('status', ['terverifikasi', 'belum', 'Diproses Kelurahan', 'penugasan'])
                                   ->whereIn('id_kelurahan', ['2'])->findAll();
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
            $data[$key]['nama_user'] = $user->where('id_user', $value['id_user'])->first()['nama_user'];
            $data[$key]['nama_kelurahan'] = $kelurahan->where('id_kelurahan', $value['id_kelurahan'])->first()['nama_kelurahan'];
        }
        // dd($data);
        $data = [
            'pelayanan' => $layanan->findAll(),
            'data' => $data
        ];
        return view('kelurahan/data_laporan', $data);
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
        return view('kelurahan/tambahLaporan', $data);
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
            'status' => 'Terverifikasi',
            'tanggal_laporan' => $this->request->getVar('tanggal_laporan'),
            'asal_laporan' => 'Kelurahan'
            // 'lokasi_kejadian' => $this->request->getVar('lokasi_kejadian')
        ];
        // dd($data);
        $dataLaporan->insert($data);
        return redirect()->to('admin_kelurahan/data_laporan');
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
        return view('/kelurahan/detail', $data);
    }
    public function rujukan()
    {
        $penugasan = new PenugasanModel();
        $laporan = new DataLaporan();
        $kelurahan = new KelurahanModel();
        $user = new UsersModel();
        $laporan = new DataLaporan();
        $filteredLaporan = $laporan->whereIn('status', ['Dirujuk ke DPMPPA'])->findAll();
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
        return view('kelurahan/rujukan', $data);
    }
    public function kirimRujukan($kode_laporan)
    {
        $dataLaporan = new DataLaporan();
        $penugasanLaporan = new PenugasanModel();

        $kode_laporan = $dataLaporan->where('kode_laporan', $kode_laporan)->first();

        if ($kode_laporan) {
            // Update data status dari tabel laporan
            $dataLaporan->update($kode_laporan['kode_laporan'], [
                'status' => 'Dirujuk ke DPMPPA',
            ]);
            // tambah data ke tabel penugasan
            $penugasanLaporan->insert([
                'kode_laporan' => $kode_laporan['kode_laporan'],
                'tanggal_penugasan' => date('Y-m-d'),
            ]);
            // Redirect dengan pesan sukses
            return redirect()->to('/admin_kelurahan/rujukan')->with('success', 'Laporan berhasil ditugaskan!');
        }
        return redirect()->to('/kelurahan/data_laporan')->with('error', 'Laporan tidak ditemukan!');
    }
    public function laporan()
    {
        $laporan = new DataLaporan();
        $user = new UsersModel();
        $kelurahan = new KelurahanModel();
        $rekap = $laporan;
        // ->where('status', 'selesai');
        $data = [];
        foreach ($rekap->findAll() as $key => $value) {
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
        return view('kelurahan/laporan', $data);
    }
}
