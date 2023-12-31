<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyelenggaraModel extends Model
{
    // Nama Tabel
    protected $table      = 'tbl_penyelenggara';
    protected $primaryKey = 'id_penyelenggara';
    // protected $useTimestamps = true;
    // protected $useSoftDeletes = true;
    protected $allowedFields = ['nama_penyelenggara', 'nama_ttd', 'nip_ttd', 'ttd', 'cap'];

    public function getPenyelenggara($id = false)
    {
        

        $query = $this->table('tbl_penyelenggara')
        // ->join('tbl_acara', 'id_acara')
        ->where('deleted_at is null');
        // ->where('id', $id);
        if ($id === false) {
            return $query->findAll();
        } else {
            return $query->where(['id_penyelenggara' => $id])->first();
        }
    }
}
