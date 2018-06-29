<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title><?php echo $title . ' | ' . $this->title; ?></title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/sb-admin.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/highcharts.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/exporting.js') ?>"></script>
  </head>

  <body class="fixed-nav sticky-footer bg-light" id="page-top">

  <div class="container">
    <div class="row">
      <div style="text-align: center; padding: 15px;" class="col-md-4">
        <img style="width: 75px; height: 75px;" src="<?php echo base_url('assets/logo.png') ?>" class="img img-thumbnail">
      </div>
      <div style="text-align: center; padding: 15px;" class="col-md-4">
        <img style="width: 75px; height: 75px;" src="<?php echo base_url('assets/logo.png') ?>" class="img img-thumbnail">
      </div>
      <div style="text-align: center; padding: 15px;" class="col-md-4">
        <img style="width: 75px; height: 75px;" src="<?php echo base_url('assets/logo.png') ?>" class="img img-thumbnail">
      </div>
    </div>
    <div class="row" style="margin-top: 20px;">
      <div style="text-align: center;" class="col-md-12">
        <h4>Sistem Informasi Beasiswa Politeknik Negeri Sriwijaya</h4>
      </div>
    </div>
    <div class="card mx-auto" style="width: 60%; margin-top: 20px; background-color: #F0E68C;">
      <div class="card-body">
        <?php echo $this->session->flashdata('msg') ?>
          <div class="alert alert-dark">
            <p>Jika anda sudah mendapatkan PIN dari sistem kami, silahkan klik tombol <i>login</i>. Jika tidak, silahkan klik tombol <i>Request PIN</i></p>
          </div>
          <div class="row">
            <div class="col-md-6">
              <a href="<?php echo base_url('login') ?>" class="btn btn-dark btn-block">Login</a>
            </div>
            <div class="col-md-6">
              <a href="<?php echo base_url('main/request') ?>" style="color: #FFF;" class="btn btn-dark btn-block pull-right">Request PIN</a>
            </div>
          </div>
      </div>
    </div>
  </div>
  <footer class="sticky-footer-custom">
    <div class="container">
      <div class="text-center">
          <h6>Dikembangkan Oleh Pusat Informasi dan Hubungan Masyarakat<br>
          Politeknik Negeri Sriwijaya &copy; 2018</h6>
      </div>
    </div>
  </footer>
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin.min.js') ?>"></script>
  </div>
</body>

</html>
