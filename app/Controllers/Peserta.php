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
        $dataPeserta = $this->pesertaModel->getEditPes($id);
        $data = [
            'title' => 'Ubah Peserta',
            'validation'=> \Config\Services::validation(),
            'result' => $dataPeserta
        ];

        
        return view('peserta/edit', $data);
    }

    public function update($id)
    {
        
            if (!$this->validate(   
                [
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Peserta harus diisi',
                    ]
                ],
                'nip' => [
                    'rules' => 'required|exact_length[18]',
                    'errors' => [
                        'required' => 'Silahkan Masukan NIP',
                        'exact_length' => 'NIP harus 18 digit',
                    ]
                ],
                'no_hp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'nomor HP harus diisi',
                    ]
                ],
                'email' =>  [
                    'rules' => 'valid_emails',
                    'errors' => [
                        'valid_emails' => 'Masukan Email Yang Valid'
                    ]
                ],
            ])) 
            {
                $validation = \Config\Services::validation();
                // dd($validation);
                return redirect()->back()->withInput()->with('validation', $validation);
            }
        $dataPeserta = new PesertaModel();
        // dd($this->request->getVar('username'));
        $this->pesertaModel->save([
            'id_peserta' => $id,
            'nama' => $this->request->getVar('nama'),
            'nip' => $this->request->getVar('nip'),
            'no_hp' => $this->request->getVar('no_hp'),
            'email' => $this->request->getVar('email'),
        ]);

        session()->setFlashdata('msg', 'Berhasil memperbarui Peserta');
        return redirect()->to('/acara');
    }


    public function delete($id)
    {
        $this->pesertaModel->delete($id);
        session()->setFlashdata("msg", "Data berhasil dihapus!");
        return redirect()->to('/peserta');
    }
}
