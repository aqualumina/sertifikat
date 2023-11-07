<?php

namespace App\Controllers;

use App\Models\PesertaModel;

class Users extends BaseController
{
    private $pesertaModel;
    public function __construct()
    {
        $this->userModel = new PesertaModel();
    }

    public function index()
    {
        $dataPeserta = $this->pesertaModel->findAll();
        $data = [
            'title' => 'Data Peserta',
            'result' => $dataPeserta
        ];
        return view('peserta/index', $data);
    }

    public function edit($id)
    {
        $dataPeserta = $this->pesertaModel->getUsers($id);
        $data = [
            'title' => 'Ubah Peserta',
            'result' => $dataPeserta
        ];

        
        return view('peserta/edit', $data);
    }

    public function update($id)
    {
        $data = new PesertaModel();
        // dd($this->request->getVar('username'));
        $this->userModel->save([
            'id_peserta' => $id,
            'nama' => $this->request->getVar('nama'),
            'nip' => $this->request->getVar('nip'),
            'no_hp' => $this->request->getVar('no_hp'),
            'email' => $this->request->getVar('email'),
        ]);

        session()->setFlashdata('msg', 'Berhasil memperbarui peserta');
        return redirect()->to('/peserta');
    }


    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata("msg", "Data berhasil dihapus!");
        return redirect()->to('/users');
    }
}
