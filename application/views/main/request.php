  <div class="container">
    <div class="row">
      <div style="text-align: center; padding: 15px;" class="col-md-4">
        <img style="width: 95px; height: 95px; border: none;" src="<?php echo $polsri_img ?>" class="img img-thumbnail">
      </div>
      <div style="text-align: center; padding: 15px;" class="col-md-4">
        <img style="width: 190px; height: 95px; border: none;" src="<?php echo $pih_img ?>" class="img img-thumbnail">
      </div>
      <div style="text-align: center; padding: 15px;" class="col-md-4">
        <img style="width: 270px; height: 95px; border: none;" src="<?php echo $kemahasiswaan_img ?>" class="img img-thumbnail">
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
        <?php echo form_open('main/request') ?>
          <div class="alert alert-dark">
            <small>Request PIN dengan memasukkan Nomor Induk Mahasiswa dan Email. PIN akan dikirim ke email yang dimasukkan</small>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <label for="nim"><b>Nomor Induk Mahasiswa</b></label>
              </div>
              <div class="col-md-8">
                <input class="form-control" id="nim" type="text" name="nim" aria-describedby="nim" placeholder="Masukkan Nomor Induk Mahasiswa" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <label for="pin"><b>Email</b></label>
              </div>
              <div class="col-md-8">
                <input class="form-control" id="email" name="email" type="email" placeholder="Masukkan Email">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="offset-md-4 col-md-4">
              <button type="submit" name="request" value="Request" class="btn btn-dark btn-block">Request</button>
            </div>
            <div class="col-md-4">
              <a href="<?php echo base_url('main') ?>" style="color: #FFF;" class="btn btn-dark btn-block">Kembali</a>
            </div>
          </div>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
