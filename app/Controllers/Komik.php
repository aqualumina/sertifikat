<?php

namespace App\Controllers;

use App\Models\CategoryModelKomik;
use \App\Models\KomikModel;

// use \App\Models\CategoryModelM;
use App\Models\KomikCategoryModel;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Komik extends BaseController
{
    private $komikModel, $catModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
        $this->catModel = new KomikCategoryModel();
    }

    public function index()
    {
        $dataKomik = $this->komikModel->getKomik();
        $data = [
            'title' => 'Data Komik',
            'result' => $dataKomik
        ];
        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        $dataKomik = $this->komikModel->getKomik($slug);
        $data = [
            'title' => 'Detail Komik',
            'result' => $dataKomik
        ];
        return view('komik/detail', $data);
    }

    public function create()
    {
        session();
        $data = [
            'title' => 'Tambah Komik',
            'category' => $this->catModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('komik/create', $data);
    }

    public function save()
    {
        // dd();
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
            'tahun_rilis' => 'required|integer',
            'penulis' => 'required',
            'harga' => 'required|numeric',
            'diskon' => 'permit_empty|decimal',
            'stok' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'integer' => '{field} hanya boleh angka'
                ]
            ],
            'sampul' =>
            [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar tidak boleh lebih dari 1MB!!',
                    'is_image' => 'Yang anda pilih bukan gambar!',
                    'mime_in' => 'Yang anda pilih bukan gambar!',
                ]
            ],
        ])) {
            return redirect()->to('komik/create')->withInput();
        }
        $fileSampul = $this->request->getFile('sampul');
        if ($fileSampul->getError() == 4) {
            $namaFile = $this->defaultImage;
        } else {

            $namaFile = $fileSampul->getRandomName();

            $fileSampul->move('img', $namaFile);
        }
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'tahun_rilis' => $this->request->getVar('tahun_rilis'),
            'penulis' => $this->request->getVar('penulis'),
            'harga' => $this->request->getVar('harga'),
            'diskon' => $this->request->getVar('diskon'),
            'stok' => $this->request->getVar('stok'),
            'komik_category_id' => $this->request->getVar('komik_kategori_id'),
            'slug' => $slug,
            'cover' => $namaFile
        ]);

        session()->setFlashdata("msg", "Komik berhasil ditambahkan!");

        return redirect()->to('/komik');
    }

    public function edit($slug){
        $dataKomik = $this->komikModel->getKomik($slug);
        if (empty($dataKomik)){
            throw new \CodeIgniter\Exeptions\PageNotFoundExeption("Judul komik $slug tidak ditemukan!");

        }
        $data=[
            'title'=> 'Ubah Komik',
            'category'=> $this->catModel->findAll(),
            'validation'=> \Config\Services::validation(),
            'result'=> $dataKomik
        ];
        return view('komik/edit',$data);
    }
    public function update($id){

        $dataOld = $this->komikModel->getKomik($this->request->getVar('slug'));
        if ($dataOld['judul']==$this->request->getVar('judul')){
        $rule_judul ='required';
        }else{
            $rule_judul = 'required|is_unique[komik.judul]';
        }
        
        if(!$this->validate([
            'judul'=> [
                'rules'=>$rule_judul,
            'errors'=>[
                'required'=> '{field} harus diisi',
                'is-unique'=> '{field} hanya sudah ada'
            ]
        ],
            'penulis'=> 'required',
            'tahun_rilis'=>'required|integer',
            'harga'=>'required|numeric',
            'diskon'=>'permit_empty|decimal',
            'stok'=>'required|integer',
            'sampul' => 
                [
                    'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Gambar tidak boleh lebih dari 1MB!!',
                        'is_image' => 'Yang anda pilih bukan gambar!',
                        'mime_in' => 'Yang anda pilih bukan gambar!',
                    ]
                ],
        ])){
            return redirect()->to('/komik/edit/'.$this->request->getVar('slug'))->withInput();
        }
        $namaFileLama = $this->request->getVar('sampullama');
        // Mengambil file sampul yang lama
        $fileSampul = $this->request->getFile('sampul');
        // mengecek gambar apakah gambar lama
        $namaFile = $namaFileLama;
                if ($fileSampul->getError() == 4){
                    $namaFile = $namaFileLama;
                } else{
                   
                   //mengenerate nama file
                    $namaFile = $fileSampul->getRandomName();
                   
                    $fileSampul->move('img',$namaFile);
                    if($namaFileLama != $this->defaultImage && $namaFileLama != ""){
                        unlink('img/' . $namaFileLama);
                    }
                }
         $slug = url_title($this->request->getVar('judul'),'-',true);
            $this->komikModel->save([
                'komik_id'=> $id,
                'judul'=> $this->request->getVar('judul'),
                'penulis'=> $this->request->getVar('penulis'),
                'tahun_rilis'=> $this->request->getVar('tahun_rilis'),
                'harga'=> $this->request->getVar('harga'),
                'diskon'=> $this->request->getVar('diskon'),
                'stok'=> $this->request->getVar('stok'),
                'komik_category_id'=> $this->request->getVar('komik_kategori_id'),
                'slug'=> $slug,
                'cover'=> $namaFile
            ]);
            session()->setFlashdata("msg","Komik berhasil diubah!");
            return redirect()->to('/komik');
        }        

    public function delete($id)
    {
        $dataKomik = $this->komikModel->find($id);
        $this->komikModel->delete($id);
        if ($dataKomik['cover'] != $this->defaultImage) {
            unlink('img/' . $dataKomik['cover']);
        }
        session()->setFlashdata("msg", "Komik berhasil dihapus!");
        return redirect()->to('/komik');
    }
    public function importData()
    {
        $file = $this->request->getFile("file");
        $ext = $file->getExtension();
        if ($ext == "xls")
            $reader = new Xls();
        else
            $reader = new Xlsx();

        $spreadsheet = $reader->load($file);
        $sheet = $spreadsheet->getActiveSheet()->toArray();

        foreach ($sheet as $key => $value) {
            if ($key == 0) continue;
            $namaFile = $this->defaultImage;
            $slug = url_title($value[1], '-', true);

            $dataOld = $this->komikModel->getKomik($slug);
            if ($dataOld['judul'] != $value[1]) {
                $this->komikModel->save([
                    'judul' => $value[1],
                    'penulis' => $value[2],
                    'tahun_rilis' => $value[3],
                    'harga' => $value[4],
                    'diskon' => $value[5] ?? 0,
                    'stok' => $value[6],
                    'komik_category_id' => $value[7],
                    'slug' => $slug,
                    'cover' => $namaFile,

                ]);
            }
        }

        session()->setFlashData("msg", "Data berhasil diimport!");
        return redirect()->to('/komik');
    }
}
