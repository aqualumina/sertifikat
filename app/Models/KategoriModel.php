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

}
