<?php

namespace App\Controllers;

use \App\Models\AcaraModel;
use \App\Models\PenyelenggaraModel;
use \App\Models\PesertaModel;
use \App\Models\KategoriModel;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PHPUnit\Util\Xml\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Acara extends BaseController
{
    private $acaraModel;
    private $penyelenggaraModel;
    private $pesertaModel;
    private $kategoriModel;
    public function __construct()
    {
        $this->acaraModel = new AcaraModel();
        $this->penyelenggaraModel = new PenyelenggaraModel();
        $this->pesertaModel = new PesertaModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        // $getTotal = $this->acaraModel->Total();
        $dataAcara = $this->acaraModel->getAcara();
        $data = [
            'title'  => "Data Acara",
            'result' => $dataAcara,
            // 'total'  => $getTotal,
        ];
        // dd($data);
        return view('acara/index', $data);
    }

    public function detail($id)
    {
        $Total = $this->pesertaModel->where('id_acara', $id)->CountAllResults();
        $dataPeserta = $this->pesertaModel->where('id_acara', $id)->findAll();
        
        $data = [
            'title' => 'Data Peserta',
            'result' => $dataPeserta,
            'total' => $Total,
        ];
        
        return view('peserta/index', $data);
    }

    public function create()
    {
        session();
        $data = [
            'title'         => 'Data Acara',
            'kategori'      => $this->kategoriModel->findAll(),
            'penyelenggara' => $this->penyelenggaraModel->findAll(),
            'peserta'       => $this->pesertaModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        // dd($data);
        return view('acara/create', $data);
    }

    public function save()
    {

        $start  = $this->request->getVar('tgl_acara_mulai');
        $end    = $this->request->getVar('tgl_acara_selesai');
        //menghitung selisih dengan hasil detik
        $diff = strtotime($end) - strtotime($start);

        //membagi detik menjadi jam
        $jam    = floor($diff / (60 * 60));

        //membagi sisa detik setelah dikurangi $jam menjadi menit
        $menit    = $diff - $jam * (60 * 60);

        $dataAcara = new AcaraModel();
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
            // 'tgl_acara' =>  [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tanggal Acara  Harus Diisi'
            //     ]
            // ],
            // 'tgl_acara_akhir' =>  [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tanggal Acara Akhir  Harus Diisi'
            //     ]
            // ],
        ])) {
            // return redirect()->to('/acara/create')->withInput();
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $id_kategori = $this->request->getVar('id_kategori');

        if($id_kategori == 1)
        {
            $no_sertifikat = 100;
        } else if ($id_kategori == 2) {
            $no_sertifikat = 200;
        } else {

        }

        $dataAcara->save([

            'jenis_dokumen' => $this->request->getVar('jenis_dokumen'),
            'nama_acara' => $this->request->getVar('nama_acara'),
            'narasumber' => $this->request->getVar('narasumber'),
            'no_sertifikat' => $no_sertifikat,
            'tgl_sertifikat' => $this->request->getVar('tgl_sertifikat'),
            'tgl_acara_mulai' => $this->request->getVar('tgl_acara_mulai'),
            'tgl_acara_selesai' => $this->request->getVar('tgl_acara_selesai'),
            'id_penyelenggara' => $this->request->getVar('penyelenggara'),
            'id_kategori' => $id_kategori,
            'jpl' => $jam,
            

        ]);

        session()->setFlashdata('msg', 'Berhasil menambahkan acara');
        // dd($dataAcara);
        
        return redirect()->to('/acara');
    }

    public function edit($id)
    {
        $dataAcara = $this->acaraModel->getAcara($id);
        $data = [
            'title' => 'Ubah Acara',
            'kategori'      => $this->kategoriModel->findAll(),
            'penyelenggara' => $this->penyelenggaraModel->findAll(),
            'result' => $dataAcara,
            'validation' => \Config\Services::validation()
        ];


        return view('acara/edit', $data);
    }

    public function update($id)
    {
        $dataAcara = new AcaraModel();
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

        $start  = $this->request->getVar('tgl_acara_mulai');
        $end    = $this->request->getVar('tgl_acara_selesai');
        //menghitung selisih dengan hasil detik
        $diff = strtotime($end) - strtotime($start);

        //membagi detik menjadi jam
        $jam    = floor($diff / (60 * 60));


        $id_kategori = $this->request->getVar('id_kategori');

        if($id_kategori == 1)
        {
            $no_sertifikat = 100;
        } else if ($id_kategori == 2) {
            $no_sertifikat = 200;
        } else {

        }

        $dataAcara->save([
            'id_acara' => $id,
            'jenis_dokumen' => $this->request->getVar('jenis_dokumen'),
            'nama_acara' => $this->request->getVar('nama_acara'),
            'narasumber' => $this->request->getVar('narasumber'),
            'no_sertifikat' => $no_sertifikat,
            'tgl_sertifikat' => $this->request->getVar('tgl_sertifikat'),
            'tgl_acara_mulai' => $this->request->getVar('tgl_acara_mulai'),
            'tgl_acara_selesai' => $this->request->getVar('tgl_acara_selesai'),
            'id_penyelenggara' => $this->request->getVar('penyelenggara'),
            'id_kategori' => $id_kategori,
            'jpl' => $jam,
            

        ]);

        session()->setFlashdata('msg', 'Berhasil memperbarui user');
        return redirect()->to('/acara');
    }

    public function delete($id)
    {
        $this->acaraModel->delete($id);
        session()->setFlashdata("msg", "Data berhasil dihapus!");
        return redirect()->to('acara/');
    }

    public function upload($id)
    {

        $dataAcara = new AcaraModel();
        $fileBG = $this->request->getFile('bgdepan');
        if ($fileBG->getError() == 4) {
            $namaFileBGDpn = $this->defaultImage;
        } else {

            $namaFileBGDpn = $fileBG->getRandomName();

            $fileBG->move('images/bgdepan', $namaFileBGDpn);
        }

        $dataAcara->save([
            'id_acara' => $id,
            'gbr_sert_depan' => $namaFileBGDpn,

        ]);
        // dd($fileBG);
        session()->setFlashdata('msg', 'Berhasil Upload Background Depan');
        return redirect()->to('/acara');
    }

    public function uploadbgbelakang($id)
    {
        $dataAcara = new AcaraModel();
        $fileBGback = $this->request->getFile('bgbelakang');
        if ($fileBGback->getError() == 4) {
            $namaFileBGBelakang = $this->defaultImage;
        } else {

            $namaFileBGBelakang = $fileBGback->getRandomName();

            $fileBGback->move('images/bgbelakang', $namaFileBGBelakang);
        }


        $dataAcara->save([
            'id_acara' => $id,
            'gbr_sert_blk' => $namaFileBGBelakang,

        ]);
        // dd($fileBG);
        session()->setFlashdata('msg', 'Berhasil Upload Background Belakang');
        return redirect()->to('/acara');
    }

    public function importData($id)
    {
        $dataPeserta = new PesertaModel();
        $file = $this->request->getFile("uploadexcel");
        $ext = $file->getClientExtension();

        // dd($ext);
        if ($ext == "xls")
            $reader = new Xls();
        else
            $reader = new Xlsx();

        $spreadsheet = $reader->load($file);
        $sheet = $spreadsheet->getActiveSheet()->toArray();

        foreach ($sheet as $key => $value) {
            if ($key == 0) {
                continue;
            }

            $this->pesertaModel->insert([
                'id_acara' => $id,
                'nama' => $value['0'],
                'nip' => $value['1'],
                'no_hp' => $value['2'],
                'email' => $value['3'],
                'kategori' => $value['4'],
                'kode_unik' => md5(($value['1'])+$id)

            ]);
        }

        session()->setFlashData("msg", "Data berhasil diimport!");
        return redirect()->to('/acara', $id);
    }
}
