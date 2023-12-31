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

    public function searchs()
    {
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

    public function search()
{
    $keyword = $this->request->getPost('cari');

    // Validasi panjang NIP minimal
    if (strlen($keyword) === 18) {
        $dataPeserta = $this->pesertaModel
            ->select('tbl_peserta.*, tbl_acara.nama_acara')
            ->join('tbl_acara', 'tbl_acara.id_acara = tbl_peserta.id_acara')
            ->like('tbl_peserta.nip', $keyword)
            ->findAll();

        $data = [
            'title' => 'Data Peserta',
            'result' => $dataPeserta,
        ];

        return view('landing', $data);
    } else {
        // validasi
        $error = "Nomor NIP harus terdiri dari 18 karakter";
        $data = [
            'title' => 'Data Peserta',
            'error' => $error,
        ];

        return view('landing', $data);
    }
}
}
