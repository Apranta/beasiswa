    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('admin') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('admin/data-jurusan') ?>">Data Jurusan</a> </li>
        <li class="breadcrumb-item active">Edit Jurusan</li>
    </ol>

     <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5>Edit Data Jurusan</h5>
                </div>
                <div class="card-body">
                    <?php echo $this->session->flashdata('msg') ?>

                    <?php echo form_open('admin/edit-jurusan/'. $data->id) ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="nim">
                                    <b>Nama<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="nama" value="<?php echo $data->nama ?>" class="form-control" required>
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
