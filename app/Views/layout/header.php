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
            <div class="d-flex align-items-center justify-content-center">
                <img src="images/diskominfo_loader.png" class="header-logo-satu" alt="">
                <div class="navbar-breadcrumb">
                    <h4 class="app-e-sertif mt-0 ml-2 text-uppercase"><b>Aplikasi E-Sertifikat</b></h4>
                </div>
            </div>
        </div>
    <ul class="navbar-list">
        <li class="line-height">
            <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                <img src="images/user/user.png" class="img-fluid rounded-circle" alt="user">
            </a>
            <div class="iq-sub-dropdown iq-user-dropdown">
                <div class="iq-card shadow-none m-0">
                    <div class="iq-card-body p-0 ">
                        <div class="p-3" style="background-color: #13998A;">
                            <h5 class="mb-0 text-white line-height">Hello Barry Tech</h5>
                            <span class="text-white font-size-12">Available</span>
                        </div>
                        <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
                            <div class="media align-items-center">
                                <div class="rounded iq-card-icon iq-bg-success">
                                    <i class="ri-file-user-line"></i>
                                </div>
                                <div class="media-body ml-3">
                                    <h6 class="mb-0 ">My Profile</h6>
                                    <p class="mb-0 font-size-12">View personal profile details.</p>
                                </div>
                            </div>
                        </a>
                        <a href="profile-edit.html" class="iq-sub-card iq-bg-primary-hover">
                            <div class="media align-items-center">
                                <div class="rounded iq-card-icon iq-bg-success">
                                    <i class="ri-profile-line"></i>
                                </div>
                                <div class="media-body ml-3">
                                    <h6 class="mb-0 ">Edit Profile</h6>
                                    <p class="mb-0 font-size-12">Modify your personal details.</p>
                                </div>
                            </div>
                        </a>
                        <a href="account-setting.html" class="iq-sub-card iq-bg-primary-hover">
                            <div class="media align-items-center">
                                <div class="rounded iq-card-icon iq-bg-success">
                                    <i class="ri-account-box-line"></i>
                                </div>
                                <div class="media-body ml-3">
                                    <h6 class="mb-0 ">Account settings</h6>
                                    <p class="mb-0 font-size-12">Manage your account parameters.</p>
                                </div>
                            </div>
                        </a>
                        <a href="privacy-setting.html" class="iq-sub-card iq-bg-primary-hover">
                            <div class="media align-items-center">
                                <div class="rounded iq-card-icon iq-bg-success">
                                    <i class="ri-lock-line"></i>
                                </div>
                                <div class="media-body ml-3">
                                    <h6 class="mb-0 ">Privacy Settings</h6>
                                    <p class="mb-0 font-size-12">Control your privacy parameters.</p>
                                </div>
                            </div>
                        </a>
                        <div class="d-inline-block w-100 text-center p-3">
                            <a class="btn-success iq-sign-btn" style="background-color: #13998A;" href="sign-in.html" role="button" >Sign out<i class="ri-login-box-line ml-2" style="color: #FFFFFF;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
            <i class="ri-menu-3-line"></i>
        </button> -->
    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
    <ul class="navbar-nav ml-auto navbar-list">
        <li class="grey"><span class="mt-2 badge badge-transparent tooltip-error"><b><?php echo $hari . "," . $tanggal . $bulan . $tahun; ?>

                    <body onload="displayTime();setInterval('displayTime()', 1000);"><b>
                            <H6 id="clock"></H6>
                        </b></body></span></b>
        </li>
    </ul>
    <!-- </div> -->

    </nav>
</div>

<script type="text/javascript">
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayTime() {
        //buat object date berdasarkan waktu saat ini
        var time = new Date();
        //ambil nilai jam,
        //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length
        var sh = time.getHours() + "";
        //ambil nilai menit
        var sm = time.getMinutes() + "";
        //ambil nilai detik
        var ss = time.getSeconds() + "";
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
    }
</script>