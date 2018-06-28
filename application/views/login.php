<?php
  $this->load->view('includes/header', array('title' => $title));
?>


<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">
        <!-- <img src="<?php echo base_url('assets/logo.png') ?>" class="img img-thumbnail"> -->
      </div>
      <div class="card-body">
        <?php echo $this->session->flashdata('msg') ?>
        <?php echo form_open('login/login-process') ?>
          <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" id="username" type="text" name="username" aria-describedby="username" placeholder="Enter username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" id="password" name="password" type="password" placeholder="Password">
          </div>
          <button type="submit" name="login-submit" value="Login" class="btn btn-primary btn-lg btn-block">Login</button>
        <?php echo form_close() ?>
        <!-- <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Request Token</a>
        </div> -->
      </div>
    </div>
  </div>
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin.min.js') ?>"></script>
  </div>
</body>

</html>
