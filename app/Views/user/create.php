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
<?php  ; ?>

                <?= $title ?>
            </div>
            <!-- error data -->
            <?php if (session('validation')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul>
                        <?php foreach (session('validation')->getErrors() as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>
            <!-- error data -->
            <?= $validation->listErrors(); ?>
            <div class="card-body">

                <!-- Form Tambah User -->
                <form action="<?= base_url('users/create') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-for  m-label">Nama Depan</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('firstname') ? 'is-invalid' : '' ?>" id="firstname" name="firstname" value="<?= old('firstname') ?> ">
                            <div class="invalid-feedback"><?= $validation->getError('firstname') ?></div>
                        </div>
                        <label for="name" class="col-sm-2 col-for  m-label">Nama Belakang</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('lastname') ? 'is-invalid' : '' ?>" id="lastname" name="lastname" value="<?= old('lastname') ?>">
                            <div id="validationCustom01" class="invalid-feedback">
                                <?= $validation->getError('lastname') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= old('username') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('username') ?>
                            </div>
                        </div>
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= old('email') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('email') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="role">
                                <option value="Karyawan">Pengguna</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-4">
                            <input class="form-control" name="password" id="inputPassword" type="password" placeholder="<?= lang('Masukan Password') ?>" autocomplete="off" />
                        </div>
                        <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-4">
                            <div class="form-floating amb-3 mb-md-0">
                                <input class="form-control" name="pass_confirm" id="pass_confirm" type="password" placeholder="<?= lang('Masukan Password Kembali') ?>" autocomplete="off" />
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
<!-- 
<script>
    function validateForm() {
        var password = document.getElementById("inputPassword").value;
        var pass_confirm = document.getElementById("pass_confirm").value;

        if (password !== pass_confirm) {
            alert("Password tidak cocok!");
            return false;
        }
    }
</script> -->

<?= $this->endSection() ?>