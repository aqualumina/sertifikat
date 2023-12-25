<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // Nama Tabel
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['firstname', 'lastname', 'role', 'user_name', 'user_email', 'user_password', 'created_at', 'updated_at', 'deleted_at'];

    public function getUsers($id = false)
    {
        $query = $this->select('*');
        if ($id === false) {
            return $query->findAll();
        } else {
            return $query->where(['id' => $id])->first();
        }
    }
}
