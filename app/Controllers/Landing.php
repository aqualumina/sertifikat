<?php

namespace App\Controllers;

use App\Models\PesertaModel;
use \App\Models\AcaraModel;

class Landing extends BaseController
{

    private $pesertaModel;
    private $acaraModel;
    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
        $this->acaraModel = new AcaraModel();
    }

    public function index()
    {
        $data = [
            'title' => "Landing"
        ];
        return view('landing');
    }

    public function search()
    {
        // $keyword = $this->request->getPost('cari');

        // $dataPeserta = $this->pesertaModel->like('nama', $keyword)
        //     ->orLike('nip', $keyword)
        //     ->findAll();



        // $data = [
        //     'title' => 'Data Peserta',
        //     'result' => $dataPeserta,
        // ];

        // return view('landing', $data);
        $keyword = $this->request->getPost('cari');

    $dataPeserta = $this->pesertaModel->like('nip', $keyword)
        // ->orLike('nip', $keyword)
        ->findAll();

    // Ambil informasi nama acara untuk setiap peserta
    foreach ($dataPeserta as &$peserta) {
        $id_acara = $peserta['id_acara'];
        $acara = $this->acaraModel->getAcara($id_acara);

        // Tambahkan informasi nama acara ke dalam data peserta
        $peserta['nama_acara'] = $acara['nama_acara'];
    }

    $data = [
        'title' => 'Data Peserta',
        'result' => $dataPeserta,
    ];

    return view('landing', $data);
    }

    // public function search($id)
    // {
    //     $dataPeserta = $this->pesertaModel->where('id_acara', $id)->findAll();

    //     $data = [
    //         'title' => 'Data Peserta',
    //         'result' => $dataPeserta,
    //     ];

    //     return view('peserta/index', $data);
    // }
}
