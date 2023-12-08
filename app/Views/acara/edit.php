<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pengelolaan Data Acara</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <?= $title ?>
            </div>
            <div class="card-body">
                <!-- Form Ubah User -->
                <form action="<?= base_url('acara/edit/' . $result['id_acara']) ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="nama_acara" class="col-sm-2 col-form-label">Nama Acara</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('nama_acara') ? 'is-invalid' : '' ?> " name="nama_acara" id="nama_acara" value="<?= $result['nama_acara'] ?>" placeholder="<?= lang('Masukan Nama Acara ') ?>">
                            <div class="invalid-feedback"><?= $validation->getError('nama_acara') ?></div>
                        </div>
                        <label for="nama_narasumber" class="col-sm-2 col-form-label">Nama Narasumber</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('narasumber') ? 'is-invalid' : '' ?>" name="narasumber" value="<?= $result['narasumber'] ?>" placeholder="<?= lang('Masukan Nama Narasumber') ?>">
                            <div class="invalid-feedback"><?= $validation->getError('narasumber') ?></div>
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
                            <select class="form-control <?= $validation->hasError('jenis_dokumen') ? 'is-invalid' : '' ?>" name="jenis_dokumen">
                                <option selected="">Pilih Jenis Dokumen</option>
                                <option value="Sertifikat">Sertifikat</option>
                                <option value="Penghargaan">Penghargaan</option>
                            </select>
                            <div class="invalid-feedback"><?= $validation->getError('jenis_dokumen') ?></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tgl_sertifikat" class="col-sm-2 col-form-label">Tanggal Sertifikat</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control <?= $validation->hasError('tgl_sertifikat') ? 'is-invalid' : '' ?>" id="tgl_sertifikat" name="tgl_sertifikat">
                            <div class="invalid-feedback"><?= $validation->getError('tgl_sertifikat') ?></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tgl_acara" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                        <div class="col-sm-4">
                            <input type="datetime-local" class="form-control <?= $validation->hasError('tgl_acara') ? 'is-invalid' : '' ?>" id="tgl_acara" name="tgl_acara_mulai">
                            <div class="invalid-feedback"><?= $validation->getError('tgl_acara') ?></div>
                        </div>
                        <label for="tgl_acara_akhir" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                        <div class="col-sm-4">
                            <input type="datetime-local" class="form-control <?= $validation->hasError('tgl_acara_akhir') ? 'is-invalid' : '' ?>" id="tgl_acara_akhir" name="tgl_acara_selesai">
                            <div class="invalid-feedback"><?= $validation->getError('tgl_acara_akhir') ?></div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="submit">Simpan</button>
                        <button class="btn btn-danger" type="reset">Batal</button>
                    </div>
                </form>
                <!--  -->
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>