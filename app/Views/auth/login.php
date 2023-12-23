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
                <h1 class="mb-4 text-center" style="color: #13988A;"><b>Aplikasi E-Sertifikat</b></h1>
                <!-- <p class="text-center text-dark">Silahkan input Username anda dan Password Untuk Masuk Menu</p> -->
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif; ?>
                <form action="/login/auth" method="post">
                    <?= csrf_field() ?>
                    <input class="form-control 
                                            <?php if (session('msg')) : ?>is-invalid
                                            <?php endif ?>" name="email" placeholder="Email atau Username" type="text" />
                    <label for="inputEmail"></label>
                    <div class="invalid-feedback">
                        <?= session('msg') ?>
                    </div>
                    <input class="form-control 
                                            <?php if (session('msg')) : ?>is-invalid
                                            <?php endif ?>" name="password" type="password" placeholder="Password" />

                    <label for="inputEmail"></label>
                    <div class="invalid-feedback">
                        <?= session('msg') ?>
                    </div>
                    <div class="d-inline-block w-100">
                        <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                            <label class="custom-control-label" for="customCheck1">Remember Me</label>
                            <!-- <a href="#" class="float-right">Forgot password?</a> -->
                        </div>
                    </div>
                    <div class="mt-4 mb-0">
                        <div class="d-grid">
                            <button type="submit" style="background-color: #13988A;" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <div class="footer text-center py-3">
                            <div class="small" style="color: #13988A;">Belum Punya Akun? <a href="/register" class="text-decoration-underline" style="color: #13988A;"><u>Registrasi Disini</u></a></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>