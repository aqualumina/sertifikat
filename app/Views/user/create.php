<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/users">Pengguna</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Pengguna</li>
            </ol>
        </nav>
        <div class="card mb-4">
            <div class="card-header">
                <!-- <i class="fas fa-table me-1"></i> -->
                <?= $title ?>
            </div>
            <div class="card-body">
                <!-- Form Tambah User -->
                <form action="<?= base_url('users/create') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-for  m-label">Nama Depan</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('firstname') ? 'is-invalid' : '' ?>" id="firstname" name="firstname" placeholder="<?= lang('Masukan Nama Depan Anda') ?>" value="<?= old('firstname') ?>">
                            <div class="invalid-feedback"><?= $validation->getError('firstname') ?></div>
                        </div>
                        <label for="name" class="col-sm-2 col-for  m-label">Nama Belakang</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('lastname') ? 'is-invalid' : '' ?>" id="lastname" name="lastname" placeholder="<?= lang('Masukan Nama Belakang Anda') ?>" value="<?= old('lastname') ?>">
                            <div id="validationCustom01" class="invalid-feedback">
                                <?= $validation->getError('lastname') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" id="username" name="username" placeholder="<?= lang('Masukan Username Anda') ?>" value="<?= old('username') ?>">
                            <div id="validationCustom01" class="invalid-feedback">
                                <?= $validation->getError('username') ?>
                            </div>
                        </div>
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="<?= lang('Masukan Username Anda') ?>" value="<?= old('email') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('email') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-4">
                            <select class="form-control <?= $validation->hasError('role') ? 'is-invalid' : '' ?>" name="role" value="<?= old('role') ?>">
                                <option value="">Silahkan Pilih Role</option>
                                <option value="Karyawan">Pengguna</option>
                                <option value="Admin">Admin</option>
                            </select>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('role') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="<?= lang('Masukan Password Anda') ?>" value="<?= old('password') ?>"> 
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('password') ?>
                            </div>
                        </div>
                        <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('pass_confirm') ? 'is-invalid' : '' ?>" id="pass_confirm" name="pass_confirm" placeholder="<?= lang('Masukan Password Kembali') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('pass_confirm') ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="submit">Simpan</button>
                        <button class="btn btn-danger" type="reset">Batal</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection() ?>