<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/users">Penyelenggara</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Penyelenggara</li>
            </ol>
        </nav>
        <div class="card mb-4">
            <div class="card-header">
                <!-- <i class="fas fa-table me-1"></i> -->
                <?= $title ?>
            </div>
            <div class="card-body">
                <!-- Form Tambah User -->
                <form action="<?= base_url('penyelenggara/create') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="penyelenggara" class="col-sm-2 col-form-label">Penyelenggara</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="<?= lang('Masukan Nama Penyelenggara') ?>" name="nama_penyelenggara">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="namattd" class="col-sm-2 col-form-label">Penandatangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="<?= lang('Masukan Nama Penandatangan') ?>" name="nama_ttd">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="<?= lang('Masukan NIP Penandatangan') ?>" name="nip_ttd">
                        </div>
                    </div>
                    <div class="mb-3 row">
                    <label for="ttd" class="col-sm-2 col-form-label">Tanda Tangan</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control <?= $validation->hasError('ttd') ?
                                                                        'is-invalid' : '' ?>" id="ttd" name="ttd" onchange="previewImage()">
                            <div id="validationTextarea" class="invalid-feedback"><?= $validation->getError('ttd') ?></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="cap" class="col-sm-2 col-form-label">Cap</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control" id="cap" name="cap" onchange="previewImage()">
                            <div id="validationTextarea" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button class="btn btn-primary mx-md-2" type="submit">Simpan</button>
                        <button class="btn btn-danger" type="reset">Batal</button>
                    </div>
                    <div class="col-sm-6 mt-2">
                        <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>