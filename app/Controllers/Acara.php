<?php

namespace App\Controllers;

use \App\Models\AcaraModel;
use \App\Models\PenyelenggaraModel;
use \App\Models\KategoriModel;

class Acara extends BaseController
{
    private $acaraModel;
    private $penyelenggaraModel;
    private $kategoriModel;
    public function __construct()
    {
        $this->acaraModel = new AcaraModel();
        $this->penyelenggaraModel = new PenyelenggaraModel();
        $this->kategoriModel = new KategoriModel();
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
            'title'         => 'Data Acara',
            'kategori'      => $this->kategoriModel->findAll(),
            'penyelenggara' => $this->penyelenggaraModel->findAll(),
            'validation' => \Config\Services::validation()
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
        

        if(!$this->validate([
            'narasumber'=> [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} hanya sudah ada'
                ]
                ],
        ])) {
            return redirect()->to('/acara/create')->withInput();
        }

        $dataAcara->save([

            'jenis_dokumen' => $this->request->getVar('jenis_dokumen'),
            'nama_acara' => $this->request->getVar('nama_acara'),
            'narasumber' => $this->request->getVar('narasumber'),
            'no_sertifikat' => $this->request->getVar('no_sertifikat'),
            'tgl_sertifikat' => $this->request->getVar('tgl_sertifikat'),
            'tgl_acara_mulai' => $this->request->getVar('tgl_acara_mulai'),
            'tgl_acara_selesai' => $this->request->getVar('tgl_acara_selesai'),
            'id_penyelenggara' => $this->request->getVar('id_penyelenggara'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'jpl' => $jam,

        ]);

        session()->setFlashdata('msg', 'Berhasil menambahkan acara');
        return redirect()->to('/acara');
    }

    public function delete($id)
    {
        $this->acaraModel->delete($id);
        session()->setFlashdata("msg", "Data berhasil dihapus!");
        return redirect()->to('acara/');
    }

    public function upload()
    {
        if ($this->request->getMethod() === 'post') {
            // Validasi gambar yang diunggah
            $validation = \Config\Services::validation();
            $validation->setRule('userfile', 'User File', 'uploaded[userfile]|max_size[userfile,1024]|mime_in[userfile,image/jpeg,image/png,image/gif]');

            if ($validation->withRequest($this->request)->run()) {
                $file = $this->request->getFile('userfile');

                if ($file->isValid() && !$file->hasMoved()) {
                    // Tentukan folder tempat gambar akan disimpan
                    $uploadPath = WRITEPATH . 'uploads'; // Sesuaikan dengan path yang sesuai

                    // Generasi nama file gambar unik
                    $newName = $file->getRandomName();

                    // Pindahkan gambar ke folder yang ditentukan
                    if ($file->move($uploadPath, $newName)) {
                        // File gambar berhasil diunggah, tambahkan logika penyimpanan data ke database jika diperlukan

                        // Redirect atau tampilkan pesan sukses
                        return redirect()->to('/acara/index')->with('success', 'Gambar berhasil diunggah.');
                    } else {
                        // Gagal memindahkan gambar, tampilkan pesan kesalahan
                        return redirect()->to('/acara/index')->with('error', 'Gagal mengunggah gambar.');
                    }
                } else {
                    // Gambar tidak valid atau gagal diunggah
                    return redirect()->to('/acara/index')->with('error', 'Gambar tidak valid atau gagal diunggah.');
                }
            } else {
                // Validasi gagal
                return redirect()->to('/acara/index')->with('error', $validation->getErrors());
            }
        }
    }
}
