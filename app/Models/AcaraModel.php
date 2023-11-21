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


    public function getId($id = false)
    {
        $query = $this->select('*');
        if ($id === false) {
            return $query->findAll();
        } else {
            return $query->where(['id_acara' => $id])->first();
        }
    }

    public function getAcara()
    {
        return $this->db->query("SELECT ta.id_acara, ta.id_penyelenggara, ta.id_kategori, ta.no_sertifikat, ta.tgl_sertifikat, 
        ta.nama_acara, ta.narasumber, ta.materi, ta.link_file, ta.tgl_acara_mulai, ta.tgl_acara_selesai, ta.jpl, ta.keterangan, 
        ta.kode_acara, ta.link_acara, ta.jumlah_peserta, ta.gbr_sert_depan, ta.gbr_sert_blk, ta.template, ta.jenis_dokumen, 
        ta.ket_statis_awal, ta.ket_statis_akhir, COUNT(ALL tp.id_peserta) AS total
        FROM tbl_acara ta
        JOIN tbl_peserta tp ON tp.id_acara = ta.id_acara
        GROUP BY tp.id_acara;")->getResultArray();

    }

    // function Total($id = false)
    // {
    //     $this->from('tbl_acara');
    //     $this->where('id_acara', $id);
    //     $data = $this->countAll();
    //     return $data;
    // }


}
