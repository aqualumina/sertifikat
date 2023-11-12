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
            // 'cap' =>
            // [
            //     'rules' => 'is_image[cap]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
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

        $fileCap = $this->request->getFile('cap');
        if ($fileCap->getError() == 4) {
            $namaFileCap = $this->defaultImage;
        } else {

            $namaFileCap = $fileCap->getRandomName();

            $fileCap->move('images/cap', $namaFileCap);
        }

        $this->penyelenggaraModel->save([

            'nama_penyelenggara' => $this->request->getVar('penyelenggara'),
            'nama_ttd' => $this->request->getVar('nama_ttd'),
            'nip_ttd' => $this->request->getVar('nip_ttd'),
            'ttd' => $namaFileTTD,
            'cap' => $namaFileCap,
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
            // 'cap' =>
            // [
            //     'rules' => 'is_image[cap]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         'max_size' => 'Gambar tidak boleh lebih dari 1MB!!',
            //         'is_image' => 'Yang anda pilih bukan gambar!',
            //         'mime_in' => 'Yang anda pilih bukan gambar!',
            //     ]
            // ],

        ])) 
        {

            return redirect()->to('/penyelenggara/edit'. $this->request->getVar('id'))->withInput();
        }
        //Data TTD
        $namaTTDLama = $this->request->getVar('ttdlama');
        // Mengambil File Sampul
        $fileTTD = $this->request->getFile('ttd');
        // Cek gambar, apakah masih gambar lama
        if ($fileTTD->getError() == 4) {
            $namaFileTTD = $namaTTDLama;
        } else {
            // Generate Nama File
            $namaFileTTD = $fileTTD->getRandomName();
            // Pindahkan File ke Folder img di public
            $fileTTD->move('images/ttd', $namaFileTTD);

            // Jika sampulnya default
            if ($namaTTDLama != $this->defaultImage && $namaFileTTD != "") {
                // hapus gambar
                unlink('images/ttd/' . $namaTTDLama);
            }
        }

        //Gambar CAP
        $namaCAPLama = $this->request->getVar('caplama');
        // Mengambil File Sampul
        $fileCAP = $this->request->getFile('cap');
        // Cek gambar, apakah masih gambar lama
        if ($fileCAP->getError() == 4) {
            $namaFileCap = $namaCAPLama;
        } else {
            // Generate Nama File
            $namaFileCap = $fileCAP->getRandomName();
            // Pindahkan File ke Folder img di public
            $fileCAP->move('images/cap', $namaFileCap);

            // Jika sampulnya default
            if ($namaCAPLama != $this->defaultImage && $namaFileCap != "") {
                // hapus gambar
                unlink('images/cap/' . $namaCAPLama);
            }
        }
        $dataPenyelenggara = new PenyelenggaraModel();
        // dd($this->request->getVar('username'));
        $this->penyelenggaraModel->save([
            'id' => $id,
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'user_name' => $this->request->getVar('username'),
            'user_email' => $this->request->getVar('email'),
            'role' => $this->request->getVar('role'),
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
