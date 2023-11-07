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
                <form action="<?= base_url('users/create') ?>" method="POST" onsubmit="return validateForm();" class="needs-validation" novalidate>
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-for  m-label">Nama Depan</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="firstname" required>
                            <div class="invalid-feedback">
                                Masukkan Nama Depan!
                            </div>
                        </div>
                        <label for="name" class="col-sm-2 col-for  m-label">Nama Belakang</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="lastname" required>
                            <div class="invalid-feedback">
                                Masukkan Nama Belakang!
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="username" required>
                            <div class="invalid-feedback">
                                Masukkan Username!
                            </div>
                        </div>
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="email" required>
                            <div class="invalid-feedback">
                                Masukkan Email!
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
                            <input class="form-control" name="password" id="inputPassword" type="password" placeholder="<?= lang('Masukan Password') ?>" autocomplete="off"  required>
                        </div>
                        <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-4">
                            <div class="form-floating amb-3 mb-md-0">
                                <input class="form-control" name="pass_confirm" id="pass_confirm" type="password" placeholder="<?= lang('Masukan Password Kembali') ?>" autocomplete="off" required>
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

<script>
    function validateForm() {
        var password = document.getElementById("inputPassword").value;
        var pass_confirm = document.getElementById("pass_confirm").value;

        if (password !== pass_confirm) {
            alert("Password tidak cocok!");
            return false;
        }
    }
</script>

<?= $this->endSection() ?>