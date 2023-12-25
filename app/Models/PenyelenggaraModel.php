<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyelenggaraModel extends Model
{
    // Nama Tabel
    protected $table      = 'tbl_penyelenggara';
    protected $primaryKey = 'id_penyelenggara';
    protected $allowedFields = ['nama_penyelenggara', 'nama_ttd', 'nip_ttd', 'ttd', 'cap'];

    public function getPenyelenggara($id = false)
    {
        

        $query = $this->table('tbl_penyelenggara')
        ->where('deleted_at is null');
        if ($id === false) {
            return $query->findAll();
        } else {
            return $query->where(['id_penyelenggara' => $id])->first();
        }
    }
}
