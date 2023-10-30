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
                <form action="<?= base_url('users/create') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-for  m-label">Nama Depan</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="firstname">
                        </div>
                        <label for="name" class="col-sm-2 col-for  m-label">Nama Belakang</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="lastname">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="username">
                        </div>
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="email">
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
                    <label for="inputPassword" class="col-sm-2 col-for  m-label">Password</label>
                        <div class="col-sm-4">
                            <input class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" id="inputPassword" type="password" placeholder="<?= lang('Masukan Password') ?>" autocomplate="off" />
                        </div>
                        <label for="inputPassword" class="col-sm-2 col-for  m-label">Confirm Password</label>
                        <div class="col-sm-4">
                            <div class="form-floating amb-3 mb-md-0">
                                <input class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" id="inputPassword" type="password" placeholder="<?= lang('Masukan Password Kembali') ?>" autocomplate="off" />
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