<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-12 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Form Registrasi</h1>
                                    </div>
                                    <?php if(!empty(session()->getFlashdata('error'))): ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?php echo session()->getFlashdata('error'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <form class="user" method="post" action="<?= base_url('/register/process') ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" name="nik"
                                                    placeholder="Masukkan NIK Anda...">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" name="nama_user"
                                                    placeholder="Masukkan Nama Anda...">
                                            </div>
                                            <div class="form-group">
                                                <select name="jenis_kelamin" class="form-control form-control-user" placeholder="Pilih Jenis Kelamin ...">
                                                    <option value="laki-laki">Laki-laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <!-- <div class="form-group">
                                                <input type="text" class="form-control form-control-user" name="tempat_tinggal"
                                                    placeholder="Masukkan Tempat Tinggal Anda...">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" name="tanggal_lahir"
                                                    placeholder="Masukkan Tanggal Lahir Anda...">
                                            </div> -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" name="username"
                                                    placeholder="Masukkan Username...">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                    name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                    name="password_confirm" placeholder="Masukkan Ulang Password">
                                            </div>
                                        </div>
                                    </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Register</button>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="<?php base_url() ?>/">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php base_url() ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php base_url() ?>/js/sb-admin-2.min.js"></script>

</body>

</html>