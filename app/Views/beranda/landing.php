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
        <div class="iq-top-navbar">
            <?= $this->include('beranda/header') ?>
        </div>

        <section class="bg-landing">
            <div class="container-fluid-landing">
                <div class="card">
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
                            <button type="button" class="btn btn-danger" onclick="resetInput()">Reset</button>
                            <br>
                        </form>


                        <!-- Tambahkan untuk menampilkan hasil pencarian -->
                        <?php if (!empty($result)) : ?>
                            <div class="container">
                                <h2>Hasil Pencarian:</h2>
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <?= $title ?>
                                    </div>
                                    <table class="table table-bordered table-hover">
                                        <thead class="thin-border-bottom mt-1">
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
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
        </section>

    </div>
</body>

</html>
<script>
    function resetInput() {
        document.getElementById("certi").value = '';
    }
</script>