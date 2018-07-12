    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= base_url('admin') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?= base_url('admin/data-user') ?>">Data User</a> </li>
        <li class="breadcrumb-item active">Tambah User</li>
    </ol>

     <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5>Tambah Data User</h5>
                </div>
                <div class="card-body">
                    <?php echo $this->session->flashdata('msg') ?>

                    <?php echo form_open('admin/tambah-user/') ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="Username">
                                    <b>Username<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="username" class="form-control" required>
                            </div>
                        </div>    
                    </div>

                     <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="Password">
                                    <b>Password<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="Email">
                                    <b>Email<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="email" class="form-control" required>
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="Role">
                                    <b>Role<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <select name="role" class="form-control" required>
                                    <option>Pilih Role</option>
                                    <option value="admin">admin</option>
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