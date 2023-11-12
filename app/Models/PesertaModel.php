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
    protected $allowedFields = ['nama', 'nip', 'no_hp', 'email', 'kode_unik', 'nama_file', 'judul','kategori'];

    public function getPeserta($id = false)
    {
        $query = $this->select('*');

        // ->where('id', $id);
        if ($id === false) {
            return $query->findAll();
        } else {
            return $query->where(['id_peserta' => $id])->first();
        }
    }
}
