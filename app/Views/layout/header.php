<?php
date_default_timezone_set('Asia/Jakarta');
//Array Hari
$array_hari = array(1 => "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
$hari = $array_hari[date("N")];
//Format Tanggal
$tanggal = date(" j");
//Array Bulan
$array_bulan = array(1 => " Januari", " Februari", " Maret", " April", " Mei", " Juni", " Juli", " Agustus", " September", " Oktober", " November", " Desember");
$bulan = $array_bulan[date("n")];
//Format Tahun
$tahun = date(" Y");
//Menampilkan hari dan tanggal
//echo $hari . "," . $tanggal . $bulan . $tahun;
?>
<div class="iq-navbar-custom">
    <!-- <nav class="navbar navbar-expand-lg navbar-light p-0"> -->
    <div class="header-app" style="background-size: cover;">
        <div class="d-flex align-items-center justify-content-center ">
            <img src="<?= base_url() ?>/images/diskominfo_loader.png" class="header-logo-satu ml-auto" alt="">
            <div class="navbar-breadcrumb ">
                <h4 class="app-e-sertif mt-0 ml-2 text-uppercase"><b>Aplikasi E-Sertifikat</b></h4>
            </div>
            <div class="navbar-nav ml-auto navbar-list">
                <li class="line-height">
                    <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                        <img src="<?= base_url() ?>/images/user/user.png" class="img-fluid rounded-circle" alt="user">
                        <b><span class="badge badge-" style="color: #FFFFFF;"><?= session()->firstname ?> <?= session()->lastname ?></b>
                    </a>
                    <div class="iq-sub-dropdown iq-user-dropdown">
                        <div class="iq-card shadow-none m-0">
                            <div class="iq-card-body p-0 ">
                                <div class="d-inline-block w-100 text-center p-3">
                                    <a class="btn-success iq-sign-btn" style="background-color: #13998A;" href="/logout" role="button">Sign out<i class="ri-login-box-line ml-2" style="color: #FFFFFF;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </li>
            </div>
        </div>
    </div>
    <!-- </nav> -->
</div>