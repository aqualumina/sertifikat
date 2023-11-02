<?php

namespace App\Controllers;

use \App\Models\AcaraModel;
use \App\Models\ProgramModel;

class Acara extends BaseController
{
    private $acaraModel;
    public function __construct()
    {
        $this->acaraModel = new AcaraModel();
        $this->programModel = new ProgramModel();
    }

    public function index()
    {
        $dataAcara = $this->acaraModel->getAcara();
        $data = [
            'title' => "Data Acara",
            'result' => $dataAcara
        ];
        return view('acara/index', $data);
    }

    public function create()
    {
        session();
        $data = [
            'title' => 'Data Acara',
            'category' => $this->programModel->findAll(),
        ];
        return view('acara/create', $data);
    }

    public function save()
    {
        $waktu_awal     = strtotime('tgl_acara_mulai');
        $waktu_akhir    = strtotime('tgl_acara_selesai'); // bisa juga waktu sekarang now()

        //menghitung selisih dengan hasil detik
        $diff    = $waktu_akhir - $waktu_awal;

        //membagi detik menjadi jam
        $jam    = floor($diff / (60 * 60));

        //membagi sisa detik setelah dikurangi $jam menjadi menit
        $menit    = $diff - $jam * (60 * 60);

        $dataAcara = new AcaraModel();
        $dataAcara->save([

            'jenis_dokumen' => $this->request->getVar('jenis_dokumen'),
            'nama_acara' => $this->request->getVar('nama_acara'),
            'narasumber' => $this->request->getVar('narasumber'),
            'no_sertifikat' => $this->request->getVar('no_sertifikat'),
            'tgl_sertifikat' => $this->request->getVar('tgl_sertifikat'),
            'tgl_acara_mulai' => $this->request->getVar('tgl_acara_mulai'),
            'tgl_acara_selesai' => $this->request->getVar('tgl_acara_selesai'),
            'jpl' => $jam,

        ]);

        session()->setFlashdata('msg', 'Berhasil menambahkan acara');
        return redirect()->to('acara/');
    }
}
