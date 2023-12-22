<?= $this->extend('layout/template') ?>

    <?= $this->section('content') ?>
    <main>
        <div class="container-fluid px-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/acara">Acara</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Peserta</li>
                </ol>
            </nav>
            <div class="card mb-4">
                <div class="card-header">
                    <!-- <i class="fas fa-table me-1"></i> -->
                    <?= $title ?>
                </div>
                <div class="card-body">
                    <!-- Form Tambah User -->
                    <form action="/peserta/edit/<?= $result['id_peserta'] ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Peserta</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama', $result['nama']) ?>">
                                <div id="validationCustom01" class="invalid-feedback">
                                    <?= $validation->getError('nama') ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nip" class="col-sm-2 col-form-label">Nip Peserta</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control <?= $validation->hasError('nip') ? 'is-invalid' : '' ?>" id="nip" name="nip" value="<?= old('nip', $result['nip']) ?>">
                                <div id="validationCustom01" class="invalid-feedback">
                                    <?= $validation->getError('nip') ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= old('email', $result['email']) ?>">
                                <div id="validationCustom01" class="invalid-feedback">
                                    <?= $validation->getError('email') ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control <?= $validation->hasError('no_hp') ? 'is-invalid' : '' ?>" id="no_hp" name="no_hp" value="<?= old('no_hp', $result['no_hp']) ?>">
                                <div id="validationCustom01" class="invalid-feedback">
                                    <?= $validation->getError('no_hp') ?>
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
