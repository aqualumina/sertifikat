    <?= $this->extend('layout/template') ?>
    <?= $this->section('content') ?>
    <main>
        <div class="container-fluid px-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/penyelenggara">Penyelenggara</a></li>
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
                    <form action="/penyelenggara/edit/<?= $result['id_penyelenggara'] ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="mb-3 row">
                            <label for="penyelenggara" class="col-sm-2 col-form-label">Penyelenggara</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control <?= $validation->hasError('penyelenggara') ? 'is-invalid' : '' ?>" name="penyelenggara"
                                 value="<?= old('penyelenggara', $result['nama_penyelenggara']) ?>">
                                <div id="validationCustom01" class="invalid-feedback">
                                    <?= $validation->getError('penyelenggara') ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_ttd" class="col-sm-2 col-form-label">Penandatangan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control <?= $validation->hasError('nama_ttd') ? 'is-invalid' : '' ?>" id="nama_ttd" name="nama_ttd" value="<?= old('nama_ttd', $result['nama_ttd']) ?>">
                                <div id="validationCustom01" class="invalid-feedback">
                                    <?= $validation->getError('nama_ttd') ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nip_ttd" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control <?= $validation->hasError('nip_ttd') ? 'is-invalid' : '' ?>" id="nip_ttd" name="nip_ttd" value="<?= old('nip_ttd', $result['nip_ttd']) ?>">
                                <div id="validationCustom01" class="invalid-feedback">
                                    <?= $validation->getError('nip_ttd') ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="ttd" class="col-sm-2 col-form-label">Tanda Tangan</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control <?= $validation->hasError('ttd') ? 'is-invalid' : '' ?>" id="ttd" name="ttd" value="<?= old('ttd') ?>" onchange="previewTTD()">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('ttd') ?>
                                </div>
                                <div class="col-sm-6 mt-2">
                                    <img src="<?= base_url() ?>/images/default.jpg" alt="" class="img-thumbnail img-preview">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="cap" class="col-sm-2 col-form-label">Cap</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control" id="cap" name="cap" value="<?= old('cap') ?>" onchange="previewCap()">
                                <!-- <div id="validationServer03Feedback" class="invalid-feedback">
                                    < ?= $validation->getError('cap') ?>
                                </div> -->
                                <div class="col-sm-6 mt-2">
                                    <img src="<?= base_url() ?>/images/default.jpg" alt="" class="img-thumbnail img-preview-cap">
                                </div>

                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <button class="btn btn-primary me-md-2" type="submit">Simpan</button>
                            <button class="btn btn-danger" type="reset">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?= $this->endSection() ?>