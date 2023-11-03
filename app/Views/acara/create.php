<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container-fluid px-4">

    <div class="card mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/acara">Acara</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Acara</li>
            </ol>
        </nav>
        <div class="card-header">
            <?= $title ?>
        </div>
        <div class="card-body">
            <!-- Form Tambah Buku -->
            <form action="<?php echo base_url(); ?>acara/create" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="mb-3 row">
                    <label for="nama_acara" class="col-sm-2 col-form-label">Nama Acara</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama_acara">
                    </div>
                    <label for="nama_narasumber" class="col-sm-2 col-form-label">Nama Narasumber</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="narasumber">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="penyelenggara" class="col-sm-2 col-form-label">Penyelenggara</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="penyelenggara">
                            <?php foreach ($penyelenggara as $value) : ?>
                                <option value="<?= $value['id_penyelenggara'] ?>">
                                    <?= $value['nama_penyelenggara'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="no_sertifikat" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-4">
                    <select class="form-control" name="no_sertifikat">
                            <?php foreach ($kategori as $value) : ?>
                                <option value="<?= $value['id_kategori'] ?>">
                                    <?= $value['nama_kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jenis_dokumen" class="col-sm-2 col-form-label">Jenis Dokumen</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="jenis_dokumen">
                            <option selected="">Pilih Jenis Dokumen</option>
                            <option value="Sertifikat">Sertifikat</option>
                            <option value="Penghargaan">Penghargaan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tgl_sertifikat" class="col-sm-2 col-form-label">Tanggal Sertifikat</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="tgl_sertifikat" name="tgl_sertifikat">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tgl_acara" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                    <div class="col-sm-4">
                        <input type="datetime-local" class="form-control" id="tgl_acara" name="tgl_acara_mulai">
                    </div>
                    <label for="tgl_acara_akhir" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                    <div class="col-sm-4">
                        <input type="datetime-local" class="form-control" id="tgl_acara_akhir" name="tgl_acara_selesai">
                    </div>
                </div>
                <div class="mb-3 row">

                </div>

                <div class="widget-toolbar"></div>
                <span style="float: right">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <button href="/" class="btn btn-xs btn-danger" type="reset" data-action="collapse">
                        Batal
                    </button>
                </span>
        </div>
        </form>
        <!--  -->
    </div>
</div>
</div>

<script>
    // Mendapatkan tanggal saat ini dalam format yyyy-mm-dd
    var currentDate = new Date().toISOString().slice(0, 10);

    // Mengatur nilai input tanggal ke tanggal saat ini
    document.getElementById('tgl_sertifikat').value = currentDate;

    // Mendapatkan tanggal dan waktu saat ini dalam format "yyyy-mm-ddThh:mm"
    var currentDatetime = new Date().toISOString().slice(0, 16);

    // Mengatur nilai input datetime-local ke tanggal dan waktu saat ini
    document.getElementById('tgl_acara').value = currentDatetime;
    document.getElementById('tgl_acara_akhir').value = currentDatetime;
</script>

<?= $this->endSection() ?>