<?php

namespace App\Controllers;

use App\Models\PenyelenggaraModel;

class Penyelenggara extends BaseController
{
    private $penyelenggaraModel;
    
    public function __construct()
    {
        $this->penyelenggaraModel = new PenyelenggaraModel();
    }

    public function index()
    {
        $dataPenyelenggara = $this->penyelenggaraModel->findAll();
        $data = [
            'title' => 'Data Penyelenggara',
            'result' => $dataPenyelenggara
        ];
        return view('penyelenggara/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Penyelenggara',
            'validation'=> \Config\Services::validation(),
        ];
        
        return view('penyelenggara/create', $data);
    }

    public function save()
    {
        
        if (!$this->validate([
            'penyelenggara' => [
                'rules' => 'required|is_unique[tbl_penyelenggara.nama_penyelenggara]',
                'errors' => [
                    'required' => 'Nama Penyeleggara harus diisi',
                    'is-unique' => 'Nama Penyelenggara sudah ada'
                ]
            ],
            'nama_ttd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Penandatangan harus diisi',
                ]
            ],
            'nip_ttd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan Masukan NIP',
                    'exact_length' => 'NIP harus 18 digit',
                ]
            ],
            // 'ttd' =>
            // [
            //     'rules' => 'required||is_image[ttd]|mime_in[ttd,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         'max_size' => 'Gambar tidak boleh lebih dari 1MB!!',
            //         'is_image' => 'Yang anda pilih bukan gambar!',
            //         'mime_in' => 'Yang anda pilih bukan gambar!',
            //     ]
            // ],

        ])) 
        {

            return redirect()->to('/penyelenggara/create')->withInput();
        }

        $fileTTD = $this->request->getFile('ttd');
        // dd($fileTTD);
        if ($fileTTD->getError() == 4) {
            $namaFileTTD = $this->defaultImage;
        } else {

            $namaFileTTD = $fileTTD->getRandomName();

            $fileTTD->move('images/ttd', $namaFileTTD);
        }

        $this->penyelenggaraModel->save([

            'nama_penyelenggara' => $this->request->getVar('penyelenggara'),
            'nama_ttd' => $this->request->getVar('nama_ttd'),
            'nip_ttd' => $this->request->getVar('nip_ttd'),
            'ttd' => $namaFileTTD,
        ]);

        session()->setFlashdata('msg', 'Berhasil menambahkan Penyelenggara');
        return redirect()->to('/penyelenggara');
    }

    public function edit($id)
    {
        $dataPenyelenggara = $this->penyelenggaraModel->getPenyelenggara($id);
        $data = [
            'title' => 'Ubah Penyelenggara',
            'validation'=> \Config\Services::validation(),
            'result' => $dataPenyelenggara
        ];


        return view('penyelenggara/edit', $data);
    }

    public function update($id)
    {
        
        if (!$this->validate([
            'penyelenggara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Penyeleggara harus diisi',
                ]
            ],
            'nama_ttd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Penandatangan harus diisi',
                ]
            ],
            'nip_ttd' => [
                'rules' => 'required|exact_length[18]',
                'errors' => [
                    'required' => 'Silahkan Masukan NIP',
                    'exact_length' => 'NIP harus 18 digit',
                ]
            ],
            // 'ttd' =>
            // [
            //     'rules' => 'required||is_image[ttd]|mime_in[ttd,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         'max_size' => 'Gambar tidak boleh lebih dari 1MB!!',
            //         'is_image' => 'Yang anda pilih bukan gambar!',
            //         'mime_in' => 'Yang anda pilih bukan gambar!',
            //     ]
            // ],

        ])) 
        {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->back()->withInput()->with('validation', $validation);
        }
        // //Data TTD
        // $namaTTDLama = $this->request->getVar('ttdlama');
        // // Mengambil File Sampul
        // $fileTTD = $this->request->getFile('ttd');
        // // Cek gambar, apakah masih gambar lama
        // if ($fileTTD->getError() == 4) {
        //     $namaFileTTD = $namaTTDLama;
        // } else {
        //     // Generate Nama File
        //     $namaFileTTD = $fileTTD->getRandomName();
        //     // Pindahkan File ke Folder img di public
        //     $fileTTD->move('images/ttd', $namaFileTTD);

        //     // Jika sampulnya default
        //     $fileTTD->move('images',$namaFileTTD);
        //     if($namaTTDLama != $this->defaultImage && $namaTTDLama != ""){
        //         unlink('images/ttd' . $namaTTDLama);
        //     }
        // }

        // Validasi input lainnya tetap ada di sini

    $fileTTD = $this->request->getFile('ttd');

    // Cek apakah ada file baru yang diunggah
    if ($fileTTD->getError() != 4) {
        // Jika ada file baru diunggah, simpan file baru
        $namaFileTTD = $fileTTD->getRandomName();
        $fileTTD->move('images/ttd', $namaFileTTD);
    } else {
        // Jika tidak ada file baru diunggah, gunakan foto lama
        $dataPenyelenggara = $this->penyelenggaraModel->find($id);
        $namaFileTTD = $dataPenyelenggara['ttd'];
    }


        
        $dataPenyelenggara = new PenyelenggaraModel();
        // dd($this->request->getVar('username'));
        $this->penyelenggaraModel->save([
            'id_penyelenggara' => $id,
            'nama_penyelenggara' => $this->request->getVar('penyelenggara'),
            'nama_ttd' => $this->request->getVar('nama_ttd'),
            'nip_ttd' => $this->request->getVar('nip_ttd'),
            // 'ttd' => $this->request->getVar('ttd'),
            'ttd' => $namaFileTTD,
        ]); 

        session()->setFlashdata('msg', 'Berhasil memperbarui Penyelenggara');
        return redirect()->to('/penyelenggara');
    }


    public function delete($id)
    {
        $this->penyelenggaraModel->delete($id);
        session()->setFlashdata("msg", "Data berhasil dihapus!");
        return redirect()->to('/penyelenggara');
    }
}
