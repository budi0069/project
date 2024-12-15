<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataLaporan;
use App\Models\KelurahanModel;
use App\Models\UsersModel;
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
            // $data[$key]['lokasi_kejadian'] = $value['lokasi_kejadian'];
            $data[$key]['nama_user'] = $user->where('id_user', $value['id_user'])->first()['nama_user'];
            $data[$key]['nama_kelurahan'] = $kelurahan->where('id_kelurahan', $value['id_kelurahan'])->first()['nama_kelurahan'];
        }
        $data = [
            'data' => $data
        ];
        return view('kelurahan/data_laporan', $data);
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
