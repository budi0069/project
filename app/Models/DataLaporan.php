<?php

namespace App\Models;

use CodeIgniter\Model;

class DataLaporan extends Model
{
    protected $table            = 'data_laporan';
    protected $primaryKey       = 'kode_laporan';
    protected $allowedFields    = ['kode_laporan', 'id_user', 'id_kelurahan', 'judul_laporan', 'deskripsi_laporan', 'deskripsi_data_korban', 'status', 'tanggal_laporan', 'lokasi_kejadian','alasan'];

    //untuk mendapatkan kode terakhir
    public function getLastKodeLaporan()
    {
        return $this->orderBy('kode_laporan', 'DESC')
            ->select('kode_laporan')
            ->first();
    }
    // public function getData(){
    //     $builder = $this->db->table('data_laporan');
    //     $builder->join('users','users.id_user = data_laporan.id_user');
    //     $builder->join('kelurahan','kelurahan.id_kelurahan = data_laporan.id_kelurahan');
    //     $query = $builder->get();
    //     return $query->getResult();
    // }
    public function getAllData()
    {
        return $this->db->table('data_laporan')
            ->join('users', 'users.id_user = data_laporan.id_user', 'left')
            ->join('kelurahan', 'kelurahan.id_kelurahan = data_laporan.id_kelurahan', 'left')
            ->select('data_laporan.*', 'users.nama_user', 'kelurahan.nama_kelurahan as kelurahan')
            ->get()
            ->getResultArray();
    }
    public function getNewReport()
    {
        return $this->where('status', 'baru')
            ->orderBy('tanggal_laporan', 'DESC')
            ->findAll();
    }
    public function getVerifiedReport()
    {
        return $this->where('status', 'terverifikasi')
            ->orderBy('tanggal_laporan', 'DESC')
            ->findAll();
    }
}
