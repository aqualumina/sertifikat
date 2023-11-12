<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<main>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Acara</li>
        </ol>
    </nav>
    <!-- Start Flash Data -->
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif; ?>
    <!-- End Flash Data -->
    <div class="card mb-4">
        <div class="card-header">
            <?= $title ?>
        </div>
        <div class="card-body">
            <form class="form-search" method=POST>
                <span style="float: right">
                    <a href="<?php echo base_url(); ?>format/format_upload.xlsx"><button class="btn btn-xs btn-success" style="background-color: #13988A;" type="button">Download Format Exel</button></a>
                    <a class="btn btn-primary" type="button" href="/acara/create">Tambah</a>
                    <a href="/" class="btn btn-xs btn-warning" type="reset" data-action="collapse">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Kembali
                        </button></a>
                </span>
            </form>
        </div>
        <table class="table table-bordered table-striped mt-3">
            <thead class="thin-border-bottom mt-1 thead-light">
                <tr>
                    <th class="center">No</th>
                    <th class="center">Acara</th>
                    <th class="center">Penerima Sertifikat</th>
                    <th class="center" colspan="4">Tindakan</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1;
                foreach ($result as $value) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td class="center">
                            <h5><?= $value['nama_acara'] ?></h5>
                            <br>
                            <b> <?= $value['tgl_acara_mulai'] ?> s/d <?= $value['tgl_acara_selesai'] ?></b>
                            <table>
                                <tr>
                                    <th>Dengan Link kegiatan : <b> links </b></th>
                                </tr>
                            </table>
                            <br><br>

                            <a href="#" data-toggle="modal">
                                <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus"></i>Upload Materi</button></a>
                            <br><br>
                            <table class="table table-bordered table-striped" border="1">
                                <tr style="background-color: #7599fa;">
                                    <td>Materi</td>
                                    <td>Narasumber</td>
                                    <td>Jpl</td>
                                    <td>Tindakan</td>
                                </tr>

                                <tr style="background-color: #edf0f7;">
                                    <td><?= $value['materi'] ?></td>
                                    <td><?= $value['narasumber'] ?></td>
                                    <td><?= $value['jpl'] ?></td>
                                    <td class="center">
                                        <form action="<?= base_url('acara/' . $value['id_acara'])  ?>" method="post" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" role="button" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="center">
                            <center><b><a class="danger" href="/peserta">
                                        <span class="badge badge-success"><?= $value['jumlah_peserta'] ?></a></span></b></center>
                        </td>
                        <td class="center">
                            <table id="simple-table" class="table table-striped table-bordered table-hover">
                                <tr>
                                    <td>Upload Peserta</td>
                                    <td><a href="#modalpeserta<?= $value['id_acara'] ?>" data-toggle="modal"><button class="btn btn-xs btn-primary" type="">Upload</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Upload Background Depan <?= $value['id_acara'] ?></td>
                                    <td><a href="#depan<?= $value['id_acara'] ?>" data-toggle="modal"><button class="btn btn-xs btn-primary" type="">Upload</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Upload Background Belakang</td>
                                    <td><a href="#belakang<?= $value['id_acara'] ?>" data-toggle="modal"><button class="btn btn-xs btn-primary" type="">Upload</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Upload Template</td>
                                    <td><a href="#template" data-toggle="modal"><button class="btn btn-xs btn-primary" type="">Upload</button></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- modal -->

                <?php endforeach; ?>
            </tbody>
        </table>

    </div>


</main>



<?= $this->include('acara/modal-peserta') ?>
 <?= $this->include('acara/modal-bgdepan') ?>
<?= $this->include('acara/modal-bgbelakang') ?>
<?= $this->include('acara/modal-stample') ?>
<?= $this->include('acara/modal-template') ?>
<?= $this->include('acara/modal-ttd') ?>

<?= $this->endSection() ?>