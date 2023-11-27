<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pengelolaan Data User</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <?= $title ?>
            </div>
            <div class="card-body">
                <!-- Form Ubah User -->
                <form action="<?= base_url('users/edit/' . $result['id']) ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-for  m-label">Nama Depan</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('firstname') ? 'is-invalid' : '' ?>" name="firstname" value="<?= $result['firstname'] ?>">
                            <div class="invalid-feedback"><?= $validation->getError('firstname') ?></div>
                        </div>
                        <label for="name" class="col-sm-2 col-for  m-label">Nama Belakang</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('lastname') ? 'is-invalid' : '' ?>" name="lastname" value="<?= $result['lastname'] ?>">
                            <div class="invalid-feedback"><?= $validation->getError('lastname') ?></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" name="username" value="<?= $result['user_name'] ?>">
                            <div class="invalid-feedback"><?= $validation->getError('username') ?></div>
                        </div>
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" name="email" value="<?= $result['user_email'] ?>">
                            <div class="invalid-feedback"><?= $validation->getError('email') ?></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-4">
                            <select class="form-control <?= $validation->hasError('role') ? 'is-invalid' : '' ?>" name="role">
                                <option value="Karyawan" <?= $result['role'] == 'Karyawan' ? 'selected' : '' ?>>Pengguna</option>
                                <option value="Admin" <?= $result['role'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
                            </select>
                            <div class="invalid-feedback"><?= $validation->getError('role') ?></div>
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