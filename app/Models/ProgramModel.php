<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramModel extends Model
{
    // Nama Tabel
    protected $table      = 'tbl_program_acara';
    protected $primaryKey = 'id_program';
    protected $allowedFields = ['firstname', 'lastname', 'role', 'user_name', 'user_email', 'user_password', 'user_created_at'];

    public function getUsers($id = false)
    {
        $query = $this->select('*');
        if ($id === false) {
            return $query->findAll();
        } else {
            return $query->where(['id_program' => $id])->first();
        }
    }
}
