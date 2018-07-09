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
        <h4>Pengajuan Beasiswa</h4>
        <hr>
    <?php echo form_open('mahasiswa/pengajuan-beasiswa') ?>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="jenis_beasiswa"><b>Jenis Beasiswa</b></label>
                </div>
                <div class="col-md-8">
                    <select class="form-control" id="jenis_beasiswa" name="jenis_beasiswa" required>
                        <option value="">Pilih Beasiswa</option>
                        <option value="PPA">PPA</option>
                        <option value="PKG">PKG</option>
                        <option value="SWADANA">SWADANA</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="ipk_terakhir"><b>IPK Semester Terakhir</b></label>
                </div>
                <div class="col-md-8">
                    <input class="form-control" required id="ipk_terakhir" name="ipk_terakhir" type="number" min="0" placeholder="Contoh: 3.35" step="any">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="<?php echo base_url('mahasiswa/data-keluarga') ?>" style="color: #FFF;" class="btn btn-dark btn-block" id="back-button">Kembali</a>
            </div>
            <div class="col-md-4">
                <button type="submit" name="submit" value="Simpan" class="btn btn-dark btn-block">Simpan</button>
            </div>
            <div class="col-md-4">
                <a href="<?php echo base_url('mahasiswa/cetak-berkas') ?>" style="color: #FFF;" class="btn btn-dark btn-block" id="next-button">Selanjutnya</a>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>
