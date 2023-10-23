<?php

namespace App\Models;
use CodeIgniter\Model;

class AcaraModel extends Model
{

    public function getAcara()
{
    $query = $this->table('motor')->join('motor_kategori', 'motor_category_id');
    return $query->get()->getResultArray();
}

    // Nama Tabel
    protected $table        = 'tbl_acara';
    // Atribut yang digunakan menjadi primary key 
    protected $primaryKey   = 'id_acara';
    // Atribut untuk menyimpan created_at dan update_at
    protected $useTimestamps    = true;
    protected $allowedFields = [
        'tgl_sertifikat', 'nama_acara', 'metode', 'tgl_acara', 'tgl_acara_akhir', 'waktu_awal',
        'waktu_akhir', 'keterangan', 'kode_acara', 'link_acara', 'sts_acara', 'sts_sertifikat',
        'jumlah_peserta', 'gbr_sert_blk', 'gbr_sert_blk', 'id_unit', 'template', 'jenis_dokumen',
        'kepada_statis', 'ket_statis_awal', 'ket_statis_tengah', 'ket_statis_akhir', 'nama_keg_sert',
        'nama_ttd', 'nip_ttd', 'ttd', 'cap'
    ];
}