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
        'no_sertifikat','tgl_sertifikat', 'nama_acara', 'metode', 'tgl_acara', 'tgl_acara_akhir', 'waktu_awal',
        'waktu_akhir', 'keterangan', 'kode_acara', 'link_acara', 'sts_acara', 'sts_sertifikat',
        'jumlah_peserta', 'gbr_sert_blk', 'gbr_sert_blk', 'id_unit', 'template', 'jenis_dokumen',
        'kepada_statis', 'ket_statis_awal', 'ket_statis_tengah', 'ket_statis_akhir', 'nama_keg_sert',
        'nama_ttd', 'nip_ttd', 'ttd', 'cap'
    ];

    public function getAcara($id_acara = false)
    {
        $query = $this->select('*');

        // ->where('id', $id);
        if ($id_acara === false) {
            return $query->findAll();
        } else {
            return $query->where(['id_acara' => $id_acara])->first();
        }
    }
}