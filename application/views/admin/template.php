<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= ucfirst($this->uri->segment(2)) ?> - SIPKK</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/images/sistem/logo.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.7.0/sweetalert2.css" integrity="sha512-qWufF7Q/gWXkGNDLvqEBFmg2ZfZGtPK5i4syfx7eazH4cUO7FVRnwHzmdgKfJyyXn4koxBCXknEwIIgyE0GZPA==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.7.0/sweetalert2.js" integrity="sha512-EY+sOlhMaflzdMPOJAw2CazW4nADfI5B+tFFnfiqQj/4Zjz+S2uWzmx9963PqnCFYFc4qo6ev4pcULlnUdAA0g==" crossorigin="anonymous"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed ">
    <?php $this->view('messages'); ?>
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
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
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="" class="brand-link">
                <img src="<?= base_url() ?>assets/images/sistem/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SIPKK</span>
            </a>

            <div class="sidebar">
                <nav class="mt-3">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">Menu Utama</li>
                        <li class="nav-item">
                            <a href="<?= site_url('admin/beranda') ?>" class="nav-link  <?= $this->uri->segment(2) == 'beranda' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Beranda</p>
                            </a>
                        </li>
                        <?php
                        $master = '';
                        if ($this->uri->segment(2) == 'siswa') {
                            $master = 'active';
                        } else  if ($this->uri->segment(2) == 'guru') {
                            $master = 'active';
                        } else  if ($this->uri->segment(2) == 'kelas') {
                            $master = 'active';
                        } else  if ($this->uri->segment(2) == 'pengampu') {
                            $master = 'active';
                        } else  if ($this->uri->segment(2) == 'ta') {
                            $master = 'active';
                        } else  if ($this->uri->segment(2) == 'mapel') {
                            $master = 'active';
                        } else  if ($this->uri->segment(2) == 'kriteria') {
                            $master = 'active';
                        }
                        ?>
                        <li class="nav-item <?= $master != null ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $master ?>">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    Master Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url('admin/siswa') ?>" class="nav-link <?= $this->uri->segment(2) == 'siswa' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('admin/guru') ?>" class="nav-link <?= $this->uri->segment(2) == 'guru' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Guru</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('admin/kelas') ?>" class="nav-link <?= $this->uri->segment(2) == 'kelas' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Kelas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('admin/pengampu') ?>" class="nav-link <?= $this->uri->segment(2) == 'pengampu' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Pengampu</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('admin/ta') ?>" class="nav-link <?= $this->uri->segment(2) == 'ta' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Tahun Ajaran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('admin/mapel') ?>" class="nav-link <?= $this->uri->segment(2) == 'mapel' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Mata Pelajaran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('admin/kriteria') ?>" class="nav-link <?= $this->uri->segment(2) == 'kriteria' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Kriteria</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('admin/penilaian') ?>" class="nav-link <?= $this->uri->segment(2) == 'penilaian' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-compass"></i>
                                <p>Penilaian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('admin/proses') ?>" class="nav-link <?= $this->uri->segment(2) == 'proses' ? 'active' : '' ?>">
                                <i class="nav-icon fa fa-chart-bar"></i>
                                <p>Proses SPK</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="<?= site_url('admin/laporan') ?>" class="nav-link <?= $this->uri->segment(2) == 'laporan' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-print"></i>
                                <p>Laporan</p>
                            </a>
                        </li> -->

                        <li class="nav-header">Pengaturan</li>
                        <li class="nav-item">
                            <a href="<?= site_url('admin/user') ?>" class="nav-link <?= $this->uri->segment(2) == 'user' ? 'active' : '' ?>">
                                <i class="nav-icon fa fa-users"></i>
                                <p>Pengguna</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="" class="nav-link <?= $this->uri->segment(2) == '' ? 'active' : '' ?>">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>Sistem</p>
                            </a>
                        </li> -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid pt-2">
                    <?= @$contents ?>
                </div><!-- /.container-fluid -->
            </section>
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

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
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
                            <a href="<?= site_url('profil') ?>">
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

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/templates/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url() ?>assets/templates/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url() ?>assets/templates/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url() ?>assets/templates/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?= base_url() ?>assets/templates/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url() ?>assets/templates/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url() ?>assets/templates/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/templates/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?= base_url() ?>assets/templates/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url() ?>assets/templates/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/templates/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url() ?>assets/templates/dist/js/pages/dashboard.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url() ?>assets/templates/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>assets/templates/plugins/toastr/toastr.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $("#example2").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
            });
            $("#example21").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
            });
            $("#example22").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
            });
            $("#example23").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
            });
            $("#example24").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
            });
            $("#example25").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
            });
            $("#konversiB").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                'order': [
                    [2, 'asc']
                ],
            });
            $("#example3").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $("#example4").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
            });
        });
        $('.toastrDefaultSuccess').click(function() {
            toastr.success('Proses Penilaian Berhasil')
        });
    </script>

    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/plugins/bootstrap-slider/css/bootstrap-slider.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
    <script src="<?= base_url() ?>assets/templates/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/plugins/bootstrap-slider/bootstrap-slider.min.js"></script>
    <?php $percent = (get_all_task_penilaian('task_done') / get_all_task_penilaian('all_task')) * 100; ?>
    <script>
        $('#range_5').ionRangeSlider({
            min: 0,
            max: 100,
            from: <?= @$percent; ?>,
            type: 'single',
            step: 0.1,
            postfix: '% penilaian',
            prettify: false,
            hasGrid: true
        })
    </script>
</body>

</html>