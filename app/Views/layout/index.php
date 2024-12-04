<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAMAI - Dampingi Anak dan Perempuan Melawan Kekerasan</title>
    <!-- Custom fonts for this template-->
    <link href="<?php

use SebastianBergmann\CodeCoverage\Report\Html\Renderer;

 base_url() ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        /* Membuat halaman menggunakan Flexbox */
        /* html, */
        /* body {
            height: 100%;
            margin: 0;
        } */

        /* Gaya khusus */
        /* .navbar {
            background-color: #00AEEF;
        } */

        /* .navbar-brand,
        .nav-link,
        .btn-login {
            color: white !important;
            font-weight: bold;
        } */

        /* .btn-login {
            border: 2px solid white;
            border-radius: 5px;
            padding: 5px 15px;
        } */

        .content {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        /* .footer {
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #00AEEF;
            color: white;
            padding: 20px 0;
        } */
    
        .visit-icon {
            color: white;
            font-size: 14px;
        }
        .footer-logo {
            height: 80px;
            margin-left: 20px;
        }
        
    </style>
</head>

<body>

    <!-- Navbar -->
    <section>
        <?php include 'navbar.php'?>
    </section>

    <!-- Konten Utama -->
    <section>
        <div class="container-fluid mt-5 mb-5 ">
              <?php $this->renderSection('content')?>
        </div>
    </section>

     <!-- Footer -->
<?php include 'footer.php'?>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php base_url() ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php base_url() ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php base_url() ?>/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php base_url() ?>/js/demo/chart-area-demo.js"></script>
    <script src="<?php base_url() ?>/js/demo/chart-pie-demo.js"></script>
</body>

</html>