<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>



<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Nama Kegiatan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <?= $title ?>
        </div>
        <div class="card-body">
            <!-- Form Tambah Buku -->
            <form action="<?php echo base_url(); ?>acara/create" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="mb-3 row">
                    <label for="jenis_dokumen" class="col-sm-2 col-form-label">Jenis Dokumen</label>
                    <select class="form-control col-sm-4" name="jenis_dokumen">
                        <option selected="">Pilih Jenis Dokumen</option>
                        <option value="Sertifikat">Sertifikat</option>
                        <option value="Penghargaan">Penghargaan</option>
                    </select>
                    <label for="nama_acara" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama_acara">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="no_sertifikat" class="col-sm-2 col-form-label">Nomor Sertifikat</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="no_sertifikat">
                    </div>
                    <label for="tgl_sertifikat" class="col-sm-2 col-form-label">Tanggal Sertifikat</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="tgl_sertifikat" name= "tgl_sertifikat">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tgl_acara" class="col-sm-2 col-form-label">Masukan Tanggal Mulai</label>
                    <div class="col-sm-4">
                        <input type="datetime-local" class="form-control" id="tgl_acara" name="tgl_acara">
                    </div>
                    <label for="tgl_acara_akhir" class="col-sm-2 col-form-label">Masukan Tanggal Selesai</label>
                    <div class="col-sm-4">
                        <input type="datetime-local" class="form-control" id="tgl_acara_akhir" name="tgl_acara_akhir">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama_ttd" class="col-sm-2 col-form-label">Nama Penandatangan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama_ttd">
                    </div>
                    <label for="nip_ttd" class="col-sm-2 col-form-label">Nip Penandatangan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nip_ttd">
                    </div>
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