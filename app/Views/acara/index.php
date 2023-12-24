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
                    <!-- <a href="/format/formatexcel.xlsx" download></a> -->
                    <a href="/format/FormatExcel.xlsx" download><button class="btn btn-xs btn-success" style="background-color: #13988A;" type="button">Download Format Excel</button></a>
                    <a class="btn btn-primary" type="button" href="/acara/create">Tambah</a>
                    <a href="/" class="btn btn-xs btn-warning" type="reset" data-action="collapse">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Kembali
                        </button></a>
                </span>
            </form>
        </div>`
        <table class="table table-bordered table-hover">
            <thead class="thin-border-bottom mt-1">
                <tr style="text-align:center">
                    <th class="center">No</th>
                    <th class="center">Acara</th>
                    <th class="center">Daftar Peserta</th>
                    <th class="center" colspan="4">Tindakan</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1;
                foreach ($result as $value) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>
                            <table id="fixed-table" class="table table-striped table-bordered table-fixed">
                                <tr>
                                    <td>Nama</td>
                                    <td width="70%"><b><?= $value['nama_acara'] ?></b></td>
                                </tr>
                                <tr>
                                    <td>Penyelenggara</td>
                                    <td width="70%"><b><?= $value['nama_penyelenggara'] ?></b></td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td width="70%"><b><?= $value['nama_kategori'] ?></b></td>
                                </tr>
                                <tr>
                                    <td>Mulai</td>
                                    <td><?= $value['tgl_acara_mulai'] ?></td>
                                </tr>
                                <tr>
                                    <td>Selesai</td>
                                    <td><?= $value['tgl_acara_selesai'] ?></td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><?= $value['jpl'] ?> Jam</td>
                                </tr>
                            </table>
                        </td>

                        <td style="text-align:center">
                            <b><a href="/acara/<?= $value['id_acara'] ?>"><span class="badge badge-success">Detail</a></b>
                        </td>

                        <td>
                            <table id="simple-table" class="table table-striped table-bordered table-hover">
                                <tr>
                                    <td>Upload Peserta</td>
                                    <td style="text-align:center">
                                        <a href="#modalpeserta<?= $value['id_acara'] ?>" data-toggle="modal">
                                            <button class="btn btn-xs btn-primary" type="">Upload</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Upload Background Depan<?= $value['id_acara'] ?></td>
                                    <td style="text-align:center">
                                        <a href="#depan<?= $value['id_acara'] ?>" data-toggle="modal">
                                            <button class="btn btn-xs btn-primary" type="">Upload</button></a>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>Upload Background Belakang</td>
                                    <td style="text-align:center">
                                        <a href="#belakang<?= $value['id_acara'] ?>" data-toggle="modal">
                                            <button class="btn btn-xs btn-primary" type="">Upload</button></a>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td>Upload Template</td>
                                    <td style="text-align:center"><a href="#template" data-toggle="modal"><button class="btn btn-xs btn-primary" type="">Upload</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Edit Acara</td>
                                    <td style="text-align:center">
                                        <a class="btn btn-warning las la-pen" href="<?= base_url('acara/edit/' . $value['id_acara'])  ?>" role="button"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hapus Acara</td>
                                    <td style="text-align:center">
                                        <form action="<?= base_url('acara/' . $value['id_acara'])  ?>" method="post" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" role="button" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                        </form>
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
<?= $this->include('acara/modal-template') ?>
<?= $this->endSection() ?>