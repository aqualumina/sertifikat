<?php

namespace App\Models;

use CodeIgniter\Model;

class AcaraModel extends Model
{

    // Nama Tabel
    protected $table        = 'tbl_acara';
    // Atribut yang digunakan menjadi primary key 
    protected $primaryKey   = 'id_acara';
    // Atribut untuk menyimpan created_at dan update_at
    protected $useTimestamps    = true;
    protected $allowedFields = [
        'no_sertifikat', 'tgl_sertifikat', 'nama_acara', 'narasumber', 'tgl_acara_mulai', 'tgl_acara_selesai',
        'keterangan', 'kode_acara', 'link_acara', 'jumlah_peserta', 'gbr_sert_depan', 'gbr_sert_blk', 'template', 'jenis_dokumen',
        'ket_statis_awal', 'ket_statis_akhir', 'nama_ttd', 'nip_ttd', 'ttd', 'cap', 'materi', 'jpl','id_penyelenggara','id_kategori'
    ];


    public function getAcara($id = false)
    {
        $query = $this->table('tbl_acara')
        ->select('*')
        ->join('tbl_penyelenggara', 'id_penyelenggara')
        ->join('tbl_kategori', 'id_kategori');
        
        if ($id === false) {
            return $query->findAll();
        } else {
            return $query->where(['id_acara' => $id])->first();
        }
    }

    function Total($id = false)
    {
        $query = $this->table('tbl_peserta')
        ->join ('tbl_acara', 'id_acara')    
        ->where('id_acara', $id)->CountAllResults();
        return $query;
    }
}
