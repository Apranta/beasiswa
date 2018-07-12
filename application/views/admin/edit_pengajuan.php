    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= base_url('admin') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?= base_url('admin/data-pengajuan') ?>">Data Pengajuan</a> </li>
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

                    <?php echo form_open('admin/edit-pengajuan/'. $data->id) ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="nim">
                                    <b>Nomor Induk Mahasiswa<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <?php  
                                    foreach ($mhs as $row)
                                    {
                                        $options[$row->nim] = $row->nim;
                                    }
                                    echo form_dropdown('nim', $options, $data->nim ?? null, [ 'required' => 'required', 'class' => 'form-control' ]);
                                ?>
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
                                <?php  
                                    foreach ($beasiswa as $rowbea)
                                    {
                                        $bea[$rowbea] = $rowbea;
                                    }
                                    echo form_dropdown('jenis_beasiswa', $bea, $data->jenis_beasiswa ?? null, [ 'required' => 'required', 'class' => 'form-control' ]);
                                ?>
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
                                <input required type="number" value="<?= $data->ipk_terakhir ?>" step="any" name="ipk_terakhir" class="form-control">
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
                                <?php  
                                    foreach ($status as $rowstat)
                                    {
                                        $stat[$rowstat] = $rowstat;
                                    }
                                    echo form_dropdown('status', $stat, $data->status ?? null, [ 'required' => 'required', 'class' => 'form-control' ]);
                                ?>
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