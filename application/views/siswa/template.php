<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= ucfirst($this->uri->segment(1)) ?> - SIPKK</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/images/sistem/logo.png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/dist/css/adminlte.min.css">
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.7.0/sweetalert2.css" integrity="sha512-qWufF7Q/gWXkGNDLvqEBFmg2ZfZGtPK5i4syfx7eazH4cUO7FVRnwHzmdgKfJyyXn4koxBCXknEwIIgyE0GZPA==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.7.0/sweetalert2.js" integrity="sha512-EY+sOlhMaflzdMPOJAw2CazW4nADfI5B+tFFnfiqQj/4Zjz+S2uWzmx9963PqnCFYFc4qo6ev4pcULlnUdAA0g==" crossorigin="anonymous"></script>

</head>

<body class="hold-transition layout-top-nav">
    <?php $this->view('messages'); ?>
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="" class="brand-brand">
                    <img src="<?= base_url() ?>assets/images/sistem/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light text-dark">SIPKK</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index3.html" class="nav-link">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Kelas</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Penilaian</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="#" class="dropdown-item">Penilaian Mata Pelajaran</a></li>
                                <li><a href="#" class="dropdown-item">Kenaikan Kelas</a></li>
                                <li><a href="#" class="dropdown-item">Raport Penilaian</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item dropdown">
                        <a href="" data-toggle="modal" data-target="#user">
                            <div class="user-panel d-flex">
                                <div class="image">
                                    <img src="<?= base_url() ?>assets/templates/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                                </div>
                                <div class="info">
                                    <span class="d-block text-dark"><?= profil()->nama_user ?></span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Layout</a></li>
                                <li class="breadcrumb-item active">Top Navigation</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>

                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk of the card's
                                        content.
                                    </p>

                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>

                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>

                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk of the card's
                                        content.
                                    </p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div><!-- /.card -->
                        </div>
                        <!-- /.col-md-6 -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title m-0">Featured</h5>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">Special title treatment</h6>

                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>

                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title m-0">Featured</h5>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">Special title treatment</h6>

                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <footer class="main-footer">
            <strong>Copyright &copy; <?= date('Y') ?> <a href="https://sekolah.data.kemdikbud.go.id/index.php/chome/profil/CDE350D3-3479-4AE3-AC13-08B164284C49" target="_blank">MTS AL-INAYAH MANADO </a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>
    <!-- Modal Group -->
    <div class="modal fade mt-5" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profil Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mt-5 mb-5 ">
                        <div class="col-sm-4 text-center">
                            <a href="<?= site_url() ?>">
                                <div class="image">
                                    <img src="<?= base_url() ?>assets/images/sistem/profil.png" class="img-circle elevation-3" alt="User Image">
                                    <h6 class="mt-4 text-dark">Profil Pengguna</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4 text-center">
                            <a href="<?= site_url() ?>">
                                <div class="image">
                                    <img src="<?= base_url() ?>assets/images/sistem/setting.png" class="img-circle elevation-3" alt="User Image">
                                    <h6 class="mt-4 text-dark">Pengaturan Pengguna</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4 text-center">
                            <a href="<?= site_url('logout') ?>" onclick="return confirm('Yakin Keluar dari Aplikasi?')">
                                <div class="image">
                                    <img src="<?= base_url() ?>assets/images/sistem/logout.png" class="img-circle elevation-3" alt="User Image">
                                    <h6 class="mt-4 text-dark">Keluar</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/templates/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/templates/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>assets/templates/dist/js/demo.js"></script>
</body>

</html>