    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('admin') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('admin/data-pengajuan') ?>">Data Pengajuan</a> </li>
        <li class="breadcrumb-item active">Tambah Pengajuan</li>
    </ol>

     <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5>Tambah Data pengajuan</h5>
                </div>
                <div class="card-body">
                    <?php echo $this->session->flashdata('msg') ?>

                    <?php echo form_open('admin/tambah-pengajuan') ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="nim">
                                    <b>Nomor Induk Mahasiswa<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <select name="nim" class="form-control" required>
                                    <option>Pilih NIM Mahasiswa</option>
                                    <?php foreach($data as $row): ?>
                                        <option value="<?php echo $row->nim ?>"><?php echo $row->nim ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="jenis_beasiswa">
                                    <b>Jenis Beasiswa<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <select name="jenis_beasiswa" class="form-control" required>
                                    <option>Pilih Jenis Beasiswa</option>
                                    <option value="PPA">PPA</option>
                                    <option value="PKG">PKG</option>
                                    <option value="SWADANA">SWADANA</option>
                                </select>
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="agama">
                                    <b>IPK Terakhir<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input required type="number" step="any" name="ipk_terakhir" class="form-control">
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="status">
                                    <b>Status<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <select name="status" class="form-control" required>
                                    <option>Pilih Status</option>
                                    <option value="baru">baru</option>
                                    <option value="perpanjangan">perpanjangan</option>
                                </select>
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="offset-md-2 col-md-10">
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                            </div>
                        </div>
                    </div>

                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
