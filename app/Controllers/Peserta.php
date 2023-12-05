<?php

namespace App\Controllers;

use App\Models\PesertaModel;

class Peserta extends BaseController
{
    private $pesertaModel;
    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
    }

    public function index($id)
    {
        $getTotal = $this->pesertaModel->Total();
        $dataPeserta = $this->pesertaModel->where('id_acara', $id)->findAll();
        
        $data = [
            'title' => 'Data Peserta',
            'result' => $dataPeserta,
            'total' => $getTotal
        ];
        
        return view('peserta/index', $data);
    }

    public function edit($id)
    {
        $dataPeserta = $this->pesertaModel->getPeserta($id);
        $data = [
            'title' => 'Ubah Peserta',
            'result' => $dataPeserta
        ];

        
        return view('peserta/edit', $data);
    }

    public function delete($id)
    {
        $this->pesertaModel->delete($id);
        session()->setFlashdata("msg", "Data berhasil dihapus!");
        return redirect()->to('/peserta');
    }

}
