    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= base_url('admin') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?= base_url('admin/data-user') ?>">Data User</a> </li>
        <li class="breadcrumb-item active">Edit User</li>
    </ol>

     <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5>Edit Data User</h5>
                </div>
                <div class="card-body">
                    <?php echo $this->session->flashdata('msg') ?>

                    <?php echo form_open('admin/edit-user/'.$data->username) ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="Username">
                                    <b>Username<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input disabled type="text" name="username" value="<?= $data->username ?>" class="form-control" readonly>
                            </div>
                        </div>    
                    </div>

                     <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="Password">
                                    <b>Password<span style="color: red;">* <small>kosongkan jika tidak diubah</small></span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input type="password" name="password" class="form-control">
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
                                <input type="text" name="email" value="<?= $data->email ?>" class="form-control" required>
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
                                <?php
                                foreach ($role as $row)
                                {
                                    $options[$row] = $row;
                                }
                                    echo form_dropdown('role', $options, $data->role ?? null, [ 'required' => 'required', 'class' => 'form-control' ]);
                                ?>
                            </div>
                        </div>    
                    </div>

                    <div class="form-group" style="margin-top: 3%;">
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