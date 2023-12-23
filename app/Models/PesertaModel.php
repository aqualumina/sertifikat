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
        $query = $this->select('*');
        if ($id === false) {
            return $query->findAll();
        } else {
            return $query->get()->getResultArray();
            return $query->where(['id_peserta' => $id])->first();
        }
    }
    public function getPesertabyAcara($id,$idpeserta)
    {
        $query = $this->select('*');
                  return $query->where(['id_acara' => $id])->where(['id_peserta' => $idpeserta])->first();}

    function Total($id = false)
    {
        $this->from('tbl_peserta');
        $this->where('id_acara', $id);
        $data = $this->countAll();
        return $data;
    }
    
}
