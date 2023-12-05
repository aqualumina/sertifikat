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
            'result' => $dataPeserta,
            'validation' => \Config\Services::validation()
        ];

        
        return view('peserta/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_acara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Acara Harus Diisi',
                ]
            ],
            'narasumber' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Narasumber Harus Diisi',
                ]
            ],
            'jenis_dokumen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Dokumen Harus Diisi',
                ]
            ],
            'tgl_sertifikat' =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Sertifikat  Harus Diisi'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $this->pesertaModel->save([
            
            'nama' => $this->request->getVar('nama'),
            'nip' => $this->request->getVar('nip'),
            'no_hp' => $this->request->getVar('no_hp'),
            'email' => $this->request->getVar('email'),
            'kode_unik' => md5($this->request->getVar('nip')+$id)
        ]);

        session()->setFlashdata('msg', 'Berhasil memperbarui user');
        return redirect()->to('/peserta');
    }

    public function delete($id)
    {
        $this->pesertaModel->delete($id);
        session()->setFlashdata("msg", "Data berhasil dihapus!");
        return redirect()->to('/peserta');
    }
}
