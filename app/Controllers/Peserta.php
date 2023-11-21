<?php

namespace App\Controllers;

use App\Models\PesertaModel;
use App\Models\AcaraModel;

class Peserta extends BaseController
{
    private $pesertaModel, $acaraModel;
    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
        $this->acaraModel = new AcaraModel();
    }  

    public function index($id_acara)
    {
        $dataPeserta = $this->pesertaModel->where('id_acara', $id_acara)->findAll();
        // dd($dataPeserta);
        $data = [
            'title' => 'Data Peserta',
            'result' => $dataPeserta
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
