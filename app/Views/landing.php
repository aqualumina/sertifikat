<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>App Sertifikat Pelatihan</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/images/diskominfo_loader.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/bootstrap.min.css">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/typography.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/style-navigation.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/responsive.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/validation.css">

</head>



<body>
    <div class="wrapper">
        <header>
            <div class="w3-container pb-1" style="background-color: #13998A ;">
                <div class="landing-a p-2 d-flex justify-content-between">
                    <div style="color: #13998A;">/</div>
                    <div class="text-hover">
                        <img src="<?= base_url() ?>/images/diskominfo_loader.png" class="header-logo-landing ml-auto" alt="">
                        <a href="https://www.jogjakota.go.id/" class="app-e-sertif-landing mx-auto pt-3">Aplikasi E-Sertifikat</a>
                    </div>
                    <a href="/login" class="login-tombol-landing pt-3 pr-3 fas fa-user-alt"><i class="las la-user iq-arrow-left-lg pr-1 icon" style="color: #FFFFFF;"></i>LOGIN</a>
                    <!-- <a href="/login" class="landing-a p-1 d-flex-end btn btn-primary float-right"><p>Login</p> -->
                    <!-- <h5 class="pt-3 ">Login</h5> --></a>
                </div>
            </div>
            <!-- <div class="bg-landing">
            <img src="images/bg.jpg" alt="">
        </div> -->
            <section class="bg-landing">
                <div class="container-fluid-landing">
                    <div class="card" style="width:48rem; height:20rem">
                        <div class="card-body">
                            <!-- <form style="text-align: center;"> -->
                            <form action="<?= base_url('/landing') ?>" method="post" style="text-align: center;">
                                <h2 class="cari-sertif pt-2">CARI SERTIFIKAT</h2>
                                <br>

                                <div style="font-size:18px; font-weight: bold; width: 70%; margin: 0 auto;">
                                    <p style="color: #13998A;">Ketik NIP kemudian tekan tombol Cari</p>
                                </div><br>
                                <input type="text" placeholder="Tulis disini........" name="cari" id="certi" maxlength="100" class="form-control input-lg" style="width: 350px !important; display:inline-block; text-align: center;" required="">
                                <button type="submit" class="btn" style="background-color: #13998A; color:#FFFFFF"><i class="fa fa-search"></i><strong>C A R I</strong></button>
                                <a class="btn btn-primary" href="/landing" role="button"><strong>R E S E T</strong></a>
                                <br>
                            </form>

                            <?php if (isset($error) && !empty($error)) : ?>
                                <br>
                                <div style="font-size:18px; font-weight: bold; width: 70%; margin: 0 auto; text-align: center;">
                                    <p style="color: #DC143C;"><?= $error ?></p>
                                </div>
                            <?php endif; ?>

                            <!-- Tambahkan untuk menampilkan hasil pencarian -->
                            <?php if (!empty($result)) : ?>
                                <div style="font-size:18px; font-weight: bold; width: 70%; margin: 0 auto; text-align: center;">
                                    <h2 style="color: #13998A;">Hasil Pencarian:</h2>
                                </div>

                                <div class="container mt-4">
                                    <table class="table table-hover table-striped">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Peserta</th>
                                                <th>NIP</th>
                                                <th>Nama Acara</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($result as $value) : ?>
                                                <tr>
                                                    <td><?= $no++  ?></td>
                                                    <td><?= $value['nama'] ?></td>
                                                    <td><?= $value['nip']  ?></td>
                                                    <td><?= $value['nama_acara']  ?></td>
                                                    <td>
                                                        <a class="btn btn-primary" href="#" role="button">Download</a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>


                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        </header>
    </div>

</body>

</html>