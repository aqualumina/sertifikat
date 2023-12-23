<?= $this->extend('auth/template') ?>
<?= $this->section('content') ?>
<div class="container p-0" id="sign-in-page-box">
    <div class="bg-white form-container sign-in-container">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/tugu3.png" class="d-block w-100" alt="#">
                </div>
                <div class="carousel-item">
                    <img src="images/prambanan-3.png" class="d-block w-100" alt="#">
                </div>
                <div class="carousel-item">
                    <img src="images/merapi-1.jpg" class="d-block w-100" alt="#">
                </div>
            </div>
        </div>
    </div>

    <div class="overlay-container">
        <div class="sign-in-page-data">
            <div class="sign-in-from w-100 m-auto">
                <a class="logo-login mb-3" href="#"><img src="images/diskominfo_loader.png" class="img-fluid" alt="logo"></a>
                <h1 class="mb-3 text-center" style="color: #13988A;"><b>Pendaftaran Akun</b></h1>
                <!-- <p class="text-center text-dark ">Enter your email address and password to access admin panel.</p> -->
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif; ?>
                <form action="/login/save" method="post">
                    <?= csrf_field() ?>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input type="namadepan" name="namadepan" class="form-control <?php if (session('errors.namadepan')) : ?>is-invalid<?php endif ?>" placeholder="Nama Depan" autocomplete="off" />

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input type="namabelakang" name="namabelakang" class="form-control <?php if (session('errors.namabelakang')) : ?>is-invalid<?php endif ?>" placeholder="Nama Belakang" autocomplete="off" />

                            </div>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control <?php if (session('error.email')) : ?>is-invalid<?php endif ?>" name="email" type="email" placeholder="Email" value="<?= old('email') ?>" />
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="Username" value="<?= old('username') ?>" />

                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="Password" autocomplete="off" />

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="Repeat Password" autocomplete="off" />

                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-0">
                        <div class="d-grid">
                            <button type="submit" style="background-color: #13988A;" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <div class="footer text-center py-3">
                            <div class="small" style="color: #13988A;">Sudah Punya Akun ? <a href="/login" style="color: #13988A;"><u>Login Disini</u></a></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>