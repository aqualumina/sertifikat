<?php

namespace App\Controllers;

use \App\Models\AcaraModel;
use \App\Models\PenyelenggaraModel;
use \App\Models\PesertaModel;
use \App\Models\KategoriModel;
use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PHPUnit\Util\Xml\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;
use Predis\Configuration\Options;
use TCPDF;

class Acara extends BaseController
{
    private $acaraModel;
    private $penyelenggaraModel;
    private $pesertaModel;
    private $kategoriModel;
    private $mypdf;
    public function __construct()
    {
        $this->mypdf = new TCPDF();
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

        $this->acaraModel->save([
            
            'jenis_dokumen' => $this->request->getVar('jenis_dokumen'),
            'nama_acara' => $this->request->getVar('nama_acara'),
            'narasumber' => $this->request->getVar('narasumber'),
            'no_sertifikat' => $this->request->getVar('no_sertifikat'),
            'tgl_sertifikat' => $this->request->getVar('tgl_sertifikat'),
            'tgl_acara_mulai' => $this->request->getVar('tgl_acara_mulai'),
            'tgl_acara_selesai' => $this->request->getVar('tgl_acara_selesai'),
            'id_penyelenggara' => $this->request->getVar('penyelenggara'),
            'id_kategori' => $this->request->getVar('kategori'),
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
    // public function export($id){
    //     // dd($id);
    //     $acaraModel = new AcaraModel();
    //     $acara = $acaraModel->getAcara($id);

    //     $pdf = new TCPDF();

    //     $pdf->AddPage();

    //     $pdf->SetFont('times', 'normal', 12);
    //     $imageFilename = $acara['gbr_sert_depan'];
    //     $imagePath = 'C:/xampp/htdocs/sertifikat/public/images/bgbelakang/' . $imageFilename;        
    //     // $imageUrl = base_url('images/bgbelakang/' . $acara['gbr_sert_depan']);


    //     $html = '<h1>Event Details</h1>';
    //     $html .= '<img src="' . $imagePath . '" alt="Event Image">';
    //     $html .= '<p><strong>Dokumen:</strong> ' . $acara['jenis_dokumen'] . '</p>';
    //     $html .= '<p><strong>Dokumen:</strong> ' . $imagePath . '</p>';


    //     $pdf->writeHTML($html, true, false, true, false, '');

    //     $pdf->Output('custom_content.pdf', 'D');
    
    // }public function export($id){
    //     $acaraModel = new AcaraModel();
    //     $pesertaModel = new PesertaModel();
    //     $acara = $acaraModel->getAcara($id);
    //     $peserta = $pesertaModel->getPesertabyAcara($id);
    //     $pdf = new TCPDF();
    //     $pdf->AddPage('P', 'A4');
    
    //     $imageTTD = $acara['ttd'];
    //     $ttdPath = 'C:/xampp/htdocs/sertifikat/public/images/ttd/' . $imageTTD; 
    
    //     $imageCAP = $acara['cap'];
    //     $capPath = 'C:/xampp/htdocs/sertifikat/public/images/cap/1701413122_39c9501c2d92476fda45.jpeg'; 
    
    //     $imageFilename = $acara['gbr_sert_depan'];
    //     $imagePath = 'C:/xampp/htdocs/sertifikat/public/images/bgbelakang/' . $imageFilename; 
    //     $pdfWidth = $pdf->getPageWidth();
    //     $pdfHeight = $pdf->getPageHeight();
    //     $imageDimensions = getimagesize($imagePath);
    //     $imageWidth = $pdfWidth;
    //     $imageHeight = ($pdfWidth / $imageDimensions[0]) * $imageDimensions[1];
    
    //     $pdf->Image($imagePath, 0, 0, $imageWidth, $imageHeight, '', '', '', false, 300);
    
    //     $pdf->SetFont('times', 'normal', 12);
    
    //     $html = '<div style="text-align: center; color: #000; font-family: Arial, sans-serif; margin-top: '.($pdfHeight/2 - 50).'px padding: 20px; border-radius: 10px; width: 50%; margin-left: 25%;">';
    //     $html .= '<div style="margin-top: 20px;"></div>';
    //     $html .= '<div style="margin-top: 15px;"></div>'; 
    //     $html .= '<div style="font-size: 24px; margin-bottom: 5px;">Sertifikat</div>';
    //     $html .= '<div style="font-size: 8px; margin-bottom: 10px;">Kategori = pelatihan / seminar</div>';
    //     $html .= '<div style="font-size: 12px; margin-bottom: 25%;">Diberikan Kepada</div>';
    //     $html .= '<div style="font-size: 26px; margin-bottom: 20px;">' .$peserta['nama'] . '</div>';
    //     $html .= '<div style="font-size: 12px; margin-bottom: 20px;">Atas Partisipasinya dalam acara (nama Acara) pada tanggal (tanggal awal) yang diselenggarakan oleh (penyelenggara)</div>';
    //     $html .= '<div style="margin-top: 15px;"></div>'; 
    //     $html .= '<div style="font-size: 12px; margin-bottom: 25%;">Yogyakarta, (tanggal sertifikat)</div>';
    //     $html .= '<div style="font-size: 12px; margin-bottom: 25%;">penyelenggara </div>';
    //     $html .= '<img src="' . $capPath . '" alt="Event Image">';
    //     $html .= '<div style="font-size: 12px; margin-bottom: 20px;">' . $acara['nama_ttd'] . '</div>';
    //     $html .= '</div>';
    
    //     $pdf->writeHTML($html, true, false, true, false, '');
    
    //     $pdf->Output('custom_content.pdf', 'D');
    // }
   
public function export($id) {
    $acaraModel = new AcaraModel();
    $pesertaModel = new PesertaModel();
    $acara = $acaraModel->getAcara($id);
    $peserta = $pesertaModel->getPesertabyAcara($id);

    // Initialize mPDF
    $mpdf = new Mpdf();
    $mpdf->AddPage('P', 'A4');

    $imageTTD = $acara['ttd'];
    $ttdPath = 'C:/xampp/htdocs/sertifikat/public/images/ttd/' . $imageTTD;

    $imageCAP = $acara['cap'];
    $capPath = 'C:/xampp/htdocs/sertifikat/public/images/cap/1701413122_39c9501c2d92476fda4z5.jpeg';

    $imageFilename = $acara['gbr_sert_depan'];
    $imagePath = 'C:/xampp/htdocs/sertifikat/public/images/bgbelakang/' . $imageFilename;

    // Draw the background image
    $mpdf->Image($imagePath, 0, 0, 210, 297, '', '', '', false, 300);

    // Set font
    $mpdf->SetFont('times', 'normal', 12);

    // HTML content with modern styles and black font color
    $html = <<<HTML
    <div style="text-align: center; color: #000; font-family: Arial, sans-serif; padding: 20px; border-radius: 10px; width: 50%; margin-left: 25%;">
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div style="margin-top: 20px;"></div>
        <div style="margin-top: 15px;"></div>
        <div style="font-size: 45px; margin-bottom: 5px;">Sertifikat</div>
        <div style="font-size: 8px; margin-bottom: 10px;">Kategori = pelatihan / seminar</div>
        <div style="font-size: 12px; margin-bottom: 25%;">Diberikan Kepada</div>
        <div style="font-size: 26px; margin-bottom: 20px;">{$peserta['nama']}</div>
        <div style="font-size: 12px; margin-bottom: 20px;">Atas Partisipasinya dalam acara (nama Acara) pada tanggal (tanggal awal) yang diselenggarakan oleh (penyelenggara)</div>
        <div style="margin-top: 15px;"></div>
        <div style="font-size: 12px; margin-bottom: 25%;">Yogyakarta, (tanggal sertifikat)</div>
        <div style="font-size: 12px; margin-bottom: 25%;">penyelenggara </div>
        <img src="{$capPath}" alt="Event Image">
        <div style="font-size: 12px; margin-bottom: 20px;">{$acara['nama_ttd']}</div>
    </div>
    HTML;
    

    // Write HTML content
    $mpdf->WriteHTML($html);

    // Output the PDF
    $mpdf->Output('custom_content.pdf', 'D');
}
}
