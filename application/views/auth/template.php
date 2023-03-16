<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= ucfirst($this->uri->segment(2) == '' ? 'Login' : $this->uri->segment(2)) ?> - SIPKK</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/images/sistem/logo.png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/dist/css/adminlte.min.css">
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.7.0/sweetalert2.css" integrity="sha512-qWufF7Q/gWXkGNDLvqEBFmg2ZfZGtPK5i4syfx7eazH4cUO7FVRnwHzmdgKfJyyXn4koxBCXknEwIIgyE0GZPA==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.7.0/sweetalert2.js" integrity="sha512-EY+sOlhMaflzdMPOJAw2CazW4nADfI5B+tFFnfiqQj/4Zjz+S2uWzmx9963PqnCFYFc4qo6ev4pcULlnUdAA0g==" crossorigin="anonymous"></script>

</head>

<body class="hold-transition login-page">
    <?php $this->view('messages'); ?>
    <div class="login-box">
        <div class="card card-outline card-success">
            <div class="card-header text-center">
                <a href="<?= site_url('') ?>" class="text-dark">
                    <h5>Sistem Penentu Kenaikan Kelas</h5>
                    <h6>MTS AL-INAYAH MANADO</h6>
                </a>
            </div>
            <div class="card-body">
                <?= @$contents; ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/templates/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/templates/dist/js/adminlte.min.js"></script>
</body>

</html>