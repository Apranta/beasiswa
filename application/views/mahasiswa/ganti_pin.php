<div class="row">
  <div class="col-md-2">
    <img src="<?php echo $polsri_img ?>" width="100" class="pull-right">
  </div>
  <div class="col-md-8 text-center" style="margin: auto 0;">
    <h2>Sistem Informasi Beasiswa</h2>
    <h3>Politeknik Negeri Sriwijaya</h3>
  </div>
</div>
<?php echo $this->session->flashdata('msg') ?>
<div class="card mx-auto" style="width: 60%; margin-top: 20px; background-color: #F0E68C;">
    <div class="card-body">
        <h4>Ganti PIN</h4>
        <div class="alert alert-dark">
            <small>PIN terbaru akan dikirimkan melalui email yang anda masukkan</small>
        </div>
        <hr>
    <?php echo form_open('mahasiswa/ganti-pin') ?>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="email"><b>Email</b></label>
                </div>
                <div class="col-md-8">
                    <input class="form-control" placeholder="Masukkan email" required id="email" name="email" type="email">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <button type="submit" name="submit" value="Ganti" class="btn btn-dark btn-block">Ganti</button>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>
