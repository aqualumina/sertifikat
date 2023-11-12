<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        // $this->usersModel = new UsersModel();
    }

    public function index()
    {
        $dataUser = $this->userModel->findAll();
        $data = [
            'title' => 'Data User',
            'result' => $dataUser
        ];
        return view('user/index', $data);
    }



    public function create()
    {
        session();
        $data = [
            'title' => 'Tambah User',
            'validation' => \Config\Services::validation()
        ];
        return view('user/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'firstname' => [
                'rules' => 'required|is_unique[users.firstname]',
                'errors' => [
                    'required' => 'Nama Depan Harus Diisi',
                    'is_unique' => '{field} Anda Sudah Terdaftar'
                ]
            ],
            'lastname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Belakang Harus Diisi',
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username Harus Diisi',
                ]
            ],
            'email' =>  [
                'rules' => 'valid_emails',
                'errors' => [
                    'valid_emails' => 'Masukan Email Yang Valid'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Pilih Role',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Silahkan Masukan Password',
                    'min_length' => 'Panjang password minimal 5',
                ]
            ],
            'pass_confirm' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Silahkan Masukan Password',
                    'matches' => 'Password Harus Sama'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $user_myth = new UserModel();
        $user_myth->save([

            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'user_name' => $this->request->getVar('username'),
            'user_email' => $this->request->getVar('email'),
            'role' => $this->request->getVar('role'),
            'user_password' => password_hash(
                $this->request->getVar('password'),

                PASSWORD_DEFAULT
            ),

        ]);

        session()->setFlashdata('msg', 'Berhasil menambahkan user');
        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $dataUser = $this->userModel->getUsers($id);
        $data = [
            'title' => 'Ubah User',
            'result' => $dataUser
        ];


        return view('user/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'firstname' => [
                'rules' => 'required|is_unique[users.firstname]',
                'errors' => [
                    'required' => 'Nama Depan Harus Diisi',
                    'is_unique' => '{field} Anda Sudah Terdaftar'
                ]
            ],
            'lastname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Belakang Harus Diisi',
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username Harus Diisi',
                ]
            ],
            'email' =>  [
                'rules' => 'valid_emails',
                'errors' => [
                    'valid_emails' => 'Masukan Email Yang Valid'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Pilih Role',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Silahkan Masukan Password',
                    'min_length' => 'Panjang password minimal 5',
                ]
            ],
            'pass_confirm' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Silahkan Masukan Password',
                    'matches' => 'Password Harus Sama'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->back()->withInput()->with('validation', $validation);
        }
        
        $user_myth = new UserModel();
        // dd($this->request->getVar('username'));
        $this->userModel->save([
            'id' => $id,
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'user_name' => $this->request->getVar('username'),
            'user_email' => $this->request->getVar('email'),
            'role' => $this->request->getVar('role'),
        ]);

        session()->setFlashdata('msg', 'Berhasil memperbarui user');
        return redirect()->to('/users');
    }


    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata("msg", "Data berhasil dihapus!");
        return redirect()->to('/users');
    }
}
