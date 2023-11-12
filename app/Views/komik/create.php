<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>



<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">DATA KOMIK</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pengelolaan Data Komik</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title ?>
            </div>
            <div class="card-body">
                <form action="<?= base_url('komik/create') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">

                            <input type="text" class="form-control <?= $validation->hasError('judul') ? 'is-invalid'
                                                                        : '' ?>" id="judul" name="judul" value="<?= old('judul') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('judul') ?>
                            </div>
                        </div>

                    </div>
                    <div class="mb-3 row">
                        <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= $validation->hasError('penulis') ? 'is-invalid'
                                                                        : '' ?>" id="penulis" name="penulis" value="<?= old('penulis') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('penulis') ?>
                            </div>
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="tahun_rilis" class="col-sm-2 col-form-label">Tahun Rilis</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control <?= $validation->hasError('tahun_rilis') ? 'is-invalid'
                                                                        : '' ?>" id="tahun_rilis" name="tahun_rilis" value="<?= old('tahun_rilis') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('tahun_rilis') ?>
                            </div>
                        </div>

                        <label for=" stok" class="col-sm-2 col-form-label">Stok</label>

                        <div class="col-sm-3">
                            <input type="text" class="form-control <?= $validation->hasError('stok') ? 'is-invalid' : '' ?>" id="harga" name="stok" value="<?= old('stok') ?>">

                            <!-- ini pesan error -->
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('stok') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control <?= $validation->hasError('harga') ? 'is-invalid' : '' ?>" id="harga" name="harga" value="<?= old('harga') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('harga') ?>
                            </div>
                        </div>
                        <label for=" diskon" class="col-sm-2 col-form-label">Diskon</label>

                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="diskon" name="diskon">

                            <!-- ini peringatan -->

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                        <div class="col-sm-5">
                            
                            <input type="file" class="form-control <?= $validation->hasError('sampul') ?
                                                                        'is-invalid' : '' ?>" id="sampul" name="sampul" value="sampul" onchange="previewImage()">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('sampul') ?>
                            </div>
                            <div class="col-sm-6 mt-2">
                                <!-- <img src="/img/< ?= $result['cover'] == "" ? "default.jpg" : $result['cover'] ?>" alt="" class="img-thumbnail img-preview"> -->
                                <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview">
                            </div>
                        </div>
                        
                        <label for="komik_category_id" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-3">
                            <select type="text" class="form-control" id="komik_category_id" name="komik_category_id">
                                <?php foreach ($category as $value) : ?>
                                    <option value="<?= $value['komik_category_id'] ?>">
                                        <?= $value['name_category'] ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>

                    <div class="d-grip gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="submit">Simpan</button>
                        <button class="btn btn-danger" type="reset">Batal</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>
</main>
<?= $this->endSection() ?>