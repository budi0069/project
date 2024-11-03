<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAMAI - Damping Anak dan Perempuan Melawan Kekerasan</title>
    <!-- Custom fonts for this template-->
    <link href="<?php base_url() ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        /* Membuat halaman menggunakan Flexbox */
        html,
        body {
            height: 100%;
            margin: 0;
        }

        /* Gaya khusus */
        .navbar {
            background-color: #00AEEF;
            font-size: 25px;
        }

        .navbar-brand,
        .nav-link,
        .btn-login {
            color: white !important;
            font-weight: bold;
        }

        .btn-login {
            border: 2px solid white;
            border-radius: 5px;
            padding: 5px 15px;
        }

        .content {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            font-size: 25px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #00AEEF;
            color: white;
            padding: 20px 0;
        }
    
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
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">DAMAI</a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Lapor</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
            </ul>
        </div>
        <a class="btn btn-login" href="#">Login</a>
    </nav>

    <!-- Konten Utama -->
    <div class="container-fluid mt-5 ">
        <div class="content text-center ">
            <h2>Selamat Datang,</h2>
            <p><strong>DAMAI (Dampingi Anak dan Perempuan Melawan Kekerasan)</strong></p>
            <p>Damai adalah sistem layanan pengaduan kekerasan secara online yang diinisiasi oleh Kelurahan Degayu. Sistem ini digunakan untuk melaporkan tindak kekerasan terhadap perempuan dan anak kepada Tim Pendamping Kelurahan, yang terhubung dengan DPMPPA. Damai dirancang untuk memberikan kemudahan bagi masyarakat, baik sebagai korban maupun saksi, dalam melaporkan berbagai tindak kekerasan terhadap perempuan dan anak.</p>
            <div class="visit-icon mt-3">
                <i class="fas fa-eye"></i> Kunjungan: 1673
            </div>
        </div>
    </div>

     <!-- Footer -->
     <footer class="footer">
        <!-- <div class="container"> -->
            <div class="row">
                <!-- Kolom Logo dan Teks -->
                <div class="col-md-4 d-flex align-items-center">
                    <img src="<?php base_url()?>/img/logopkl.png" alt="Logo" class="footer-logo"> <!-- Sesuaikan path logo -->
                    <div class="ml-3">
                        <p><strong>DINAS PEMBERDAYAAN MASYARAKAT, PEREMPUAN, DAN PERLINDUNGAN ANAK KOTA PEKALONGAN</strong></p>
                        <p>Jl. Urip Sumoharjo No.55, Podosugih, Kec. Pekalongan Bar., Kota Pekalongan, Jawa Tengah 51117</p>
                    </div>
                </div>
                <div class="col-md-4">
                    
                </div>
                <!-- Kolom Ikon Media Sosial -->

                <div class="col-md-4 social-media ">
                    <p>Ikuti Kami</p>
                    <div>
                        <a href="#" ><i class="fab fa-instagram "></i> @dpmpa.pekalongankota</a><br>
                        <a href="#" ><i class="fab fa-twitter "></i> @dpmpa</a><br>
                        <a href="#" ><i class="fab fa-facebook "></i> Dpmppa Kota Pekalongan</a><br>
                        <a href="#" ><i class="fab fa-youtube "></i> DPMPPA Kota Pekalongan</a>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </footer>

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