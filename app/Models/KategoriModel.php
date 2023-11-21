<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    // Nama Tabel
    protected $table      = 'tbl_kategori';
    protected $primaryKey = 'id_kategori';
    protected $useTimestamps    = true;
    protected $useSoftDeletes = true;
    

    public function getKategori($id = false)
    {
        
        $query = $this->table('tbl_kategori')
        ->join('tbl_acara', 'id_acara')
        ->where('deleted_at is null');
        // ->where('id', $id);
        if ($id === false) {
            return $query->findAll();
        } else {
            return $query->where(['id_kategori' => $id])->first();
        }
    }
}
