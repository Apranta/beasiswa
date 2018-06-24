<?php
  $this->load->view('includes/header', array('title' => $title));
?>


<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">
        <!-- <img src="<?= base_url('assets/logo.png') ?>" class="img img-thumbnail"> -->
      </div>
      <div class="card-body">
        <?= form_open('login/login_process') ?>
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control" id="exampleInputEmail1" type="text" name="username" aria-describedby="emailHelp" placeholder="Enter username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Password">
          </div>
          <!-- <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div> -->
          <!-- <a class="btn btn-primary btn-block" href="index.html">Login</a> -->
          <button type="submit" name="login-submit" value="Login" class="btn btn-primary btn-lg btn-block">Login</button>
        <?= form_close() ?>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Request Token</a>
          <!-- <a class="d-block small" href="forgot-password.html">Forgot Password?</a> -->
        </div>
      </div>
    </div>
  </div>
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin.min.js') ?>"></script>
  </div>
</body>

</html>