<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    // Nama Tabel
    protected $table      = 'tbl_peserta';
    protected $primaryKey = 'id_peserta';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_acara','nama', 'nip', 'no_hp', 'email', 'kode_unik', 'nama_file', 'judul','kategori'];

    public function getPeserta($id = false)
    {
        $query = $this->table('tbl_peserta')
        ->where('id_acara', $id);
        
        if ($id === false) {
            return $query->findAll();
        } else {
            return $query->get()->getResultArray();
            return $query->where(['id_peserta' => $id])->first();
        }
    }

    function Total($id = false)
    {
        $this->from('tbl_peserta');
        $this->where('id_acara', $id);
        $data = $this->countAll();
        return $data;
    }
    
}
