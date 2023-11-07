<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>App Sertifikat Pelatihan</title>
   <!-- Favicon -->
   <link rel="shortcut icon" href="<?= base_url()?>/images/diskominfo_loader.png" />
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?= base_url()?>/css/bootstrap.min.css">
   <!-- Typography CSS -->
   <link rel="stylesheet" href="<?= base_url()?>/css/typography.css">
   <!-- Style CSS -->
   <link rel="stylesheet" href="<?= base_url()?>/css/style.css">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="<?= base_url()?>/css/responsive.css">
   <link rel="stylesheet" href="<?= base_url()?>/css/validation.css">
</head>

<body>
   <!-- loader Start -->
   <div id="loading">
      <div id="loading-center">
      </div>
   </div>
   <!-- loader END -->
   <!-- Wrapper Start -->
   <div class="wrapper">
      <!-- Sidebar  -->
      <div class="iq-sidebar">
         <?= $this->include('layout/sidebar') ?>
      </div>
      <!-- TOP Nav Bar -->
      <div class="iq-top-navbar">
         <?= $this->include('layout/header') ?>
      </div>
      <!-- TOP Nav Bar END -->
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <?= $this->renderSection('content') ?>

      </div>
   </div>
   <!-- Wrapper END -->
   <!-- Footer -->
   <?= $this->include('layout/footer') ?>
   <!-- Footer END -->
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="<?= base_url()?>/js/jquery.min.js"></script>
   <script src="<?= base_url()?>/js/popper.min.js"></script>
   <script src="<?= base_url()?>/js/bootstrap.min.js"></script>
   <!-- Appear JavaScript -->
   <script src="<?= base_url()?>/js/jquery.appear.js"></script>
   <!-- Countdown JavaScript -->
   <script src="<?= base_url()?>/js/countdown.min.js"></script>
   <!-- Counterup JavaScript -->
   <script src="<?= base_url()?>/js/waypoints.min.js"></script>
   <script src="<?= base_url()?>/js/jquery.counterup.min.js"></script>
   <!-- Wow JavaScript -->
   <script src="<?= base_url()?>/js/wow.min.js"></script>
   <!-- Apexcharts JavaScript -->
   <script src="<?= base_url()?>/js/apexcharts.js"></script>
   <!-- Slick JavaScript -->
   <script src="<?= base_url()?>/js/slick.min.js"></script>
   <!-- Select2 JavaScript -->
   <script src="<?= base_url()?>/js/select2.min.js"></script>
   <!-- Owl Carousel JavaScript -->
   <script src="<?= base_url()?>/js/owl.carousel.min.js"></script>
   <!-- Magnific Popup JavaScript -->
   <script src="<?= base_url()?>/js/jquery.magnific-popup.min.js"></script>
   <!-- Smooth Scrollbar JavaScript -->
   <script src="<?= base_url()?>/js/smooth-scrollbar.js"></script>
   <!-- lottie JavaScript -->
   <script src="<?= base_url()?>/js/lottie.js"></script>
   <!-- am core JavaScript -->
   <script src="<?= base_url()?>/js/core.js"></script>
   <!-- am charts JavaScript -->
   <script src="<?= base_url()?>/js/charts.js"></script>
   <!-- am animated JavaScript -->
   <script src="<?= base_url()?>/js/animated.js"></script>
   <!-- am kelly JavaScript -->
   <script src="<?= base_url()?>/js/kelly.js"></script>
   <!-- am maps JavaScript -->
   <script src="<?= base_url()?>/js/maps.js"></script>
   <!-- am worldLow JavaScript -->
   <script src="<?= base_url()?>/js/worldLow.js"></script>
   <!-- Raphael-min JavaScript -->
   <script src="<?= base_url()?>/js/raphael-min.js"></script>
   <!-- Morris JavaScript -->
   <script src="<?= base_url()?>/js/morris.js"></script>
   <!-- Morris min JavaScript -->
   <script src="<?= base_url()?>/js/morris.min.js"></script>
   <!-- Flatpicker Js -->
   <script src="<?= base_url()?>/js/flatpickr.js"></script>
   <!-- Style Customizer -->
   <script src="<?= base_url()?>/js/style-customizer.js"></script>
   <!-- Chart Custom JavaScript -->
   <script src="<?= base_url()?>/js/chart-custom.js"></script>
   <!-- Custom JavaScript -->
   <script src="<?= base_url()?>/js/custom.js"></script>
</body>

</html>