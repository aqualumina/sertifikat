<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<main>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
            <li class="breadcrumb-item"><a href="/acara">Acara</a></li>
            <li class="breadcrumb-item active" aria-current="page">Peserta</li>
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
        <div class="card-body">
            <div><b>
                    Jumlah Peserta :
                    <span class="badge badge-success"><?= $total ?></span>
                </b></div>
            <br>
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-hover">
                    <tr style="text-align:center">
                        <th class="center">No</th>
                        <!-- <th class="center" width="3">Pilih</th> -->
                        <th class="center">Profil</th>
                        <th class="center">Email</th>
                        <th class="center">No HP</th>
                        <!-- <th class="center">QRCODE</th> -->
                        <th class="center">Tindakan</th>
                    </tr>
                    <tbody>
                        <?php $no = 1;
                        foreach ($result as $value) : ?>
                            <tr>
                                <td><?= $no++  ?></td>
                                <!-- <td style="text-align:center;">
                                    <input type="checkbox" class="ace" value="' . $s->id_tamu . '" />
                                </td> -->
                                <td>
                                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                        <tr>
                                            <td>Nama Acara</td>
                                            <td><?= $value['nama_penyelenggara'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Acara</td>
                                            <td><?= $value['nama_acara'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td><?= $value['nama'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>NIP</td>
                                            <td><?= $value['nip'] ?></td>
                                        </tr>

                                        <tr>
                                            <td>Cetak</td>
                                            <form action="/acara/export/<?= $value['id_peserta'] ?>" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="gambar" value="<?= $value['gbr_sert_depan'] ?>">
                                                <td><button type="submit"><span class="label label-success">DOWNLOAD VERSI CETAK</span></button><br>
                                            </form>
                                        </tr>
                                        <tr>
                                            <td>Kode Unik</td>
                                            <!-- <td><a href="peserta/ubah<?= $value['id_peserta'] ?>" data-toggle="modal"><button class="btn btn-info btn-sm" type="">UBAH DATA</button></a></td> -->
                                            <td><a href="#" data-toggle="modal"></a> <?= $value['kode_unik'] ?></td>
                                        </tr>
                                    </table>
                                </td>
                                <td><?= $value['email'] ?></td>
                                <td><?= $value['no_hp'] ?></td>
                                <!-- <td>
                                    <?php if ($value['kode_unik'] != NULL) {; ?>
                                        <a href="<?php echo base_url(); ?>verify/v/<?= $value['kode_unik'] ?>/<?= $value['id_acara'] ?>" target="_blank"><img src="<?= base_url() ?>/images/diskominfo_loader.png"></a>
                                    <?php } ?>
                                </td> -->

                                <td style="text-align:center;">
                                    <a class="btn btn-warning las la-pen" href="<?= base_url('peserta/edit/' . $value['id_peserta'])  ?>" role="button"></a>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger las la-trash" role="button" onclick="return confirm('Apakah anda yakin?')"></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>