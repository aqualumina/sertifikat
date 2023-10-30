<?php

namespace App\Controllers;
use \App\Models\AcaraModel;

class Acara extends BaseController
{
    private $acaraModel;
    public function __construct()
    {
        $this->acaraModel = new AcaraModel();
    }

    public function index()
    {
        $data=[
            'title'=> "Beranda"
        ];
        return view('acara/index');
    }


// public function detail()
//     {
//         $dataAcara = $this->acaraModel->getAcara();
        
//         $data = [
//             'title' => 'Detail Acara',
//             'result' => $dataAcara
//         ];
//         return view('acara/detail', $data);
//     }

    public function create()
    {
        session();
        $data = [
            'title' => 'Aplikasi Sertifikat'
        ];
        return view('acara/create', $data);
    }

    public function save()
    {
        $dataAcara = new AcaraModel();
        $dataAcara->save([

            'jenis_dokumen' => $this->request->getVar('jenis_dokumen'),
            'nama_acara' => $this->request->getVar('nama_acara'),
            'no_sertifikat' => $this->request->getVar('no_sertifikat'),
            'tgl_sertifikat' => $this->request->getVar('tgl_sertifikat'),
            'tgl_acara' => $this->request->getVar('tgl_acara'),
            'tgl_acara_akhir' => $this->request->getVar('tgl_acara_akhir'),
            'nama_ttd' => $this->request->getVar('nama_ttd'),
            'nip_ttd' => $this->request->getVar('nip_ttd'),

        ]);

        session()->setFlashdata('msg', 'Berhasil menambahkan acara');
        return redirect()->to('acara/');
    }

}
