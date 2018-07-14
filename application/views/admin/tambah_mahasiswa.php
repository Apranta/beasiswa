    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('admin') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('admin/data-mahasiswa') ?>">Data Mahasiswa</a>
        </li>
        <li class="breadcrumb-item active">Tambah Mahasiswa</li>
    </ol>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css.map">

     <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5>Tambah Data Mahasiswa</h5>
                </div>
                <div class="card-body">
                    <?php echo $this->session->flashdata('msg') ?>

                    <?php echo form_open('admin/tambah-mahasiswa') ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="nama">
                                    <b>Nama Lengkap<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input required type="text" name="nama" class="form-control">
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="nim">
                                    <b>Nomor Induk Mahasiswa<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input required type="text" name="nim" class="form-control">
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="nim">
                                    <b>PIN<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input required type="text" name="pin" minlength="8" maxlength="8" class="form-control">
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="jenis_kelamin">
                                    <b>Jenis Kelamin<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input required type="radio" name="jenis_kelamin" value="L"> Laki-laki
                                <input required type="radio" name="jenis_kelamin" value="P"> Perempuan
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="agama">
                                    <b>Agama<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input required type="text" name="agama" class="form-control">
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="tempat_lahir">
                                    <b>Tempat Lahir<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input required type="text" name="tempat_lahir" class="form-control">
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="tanggal_lahir">
                                    <b>Tanggal Lahir<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input required readonly type="text" name="tanggal_lahir" class="form-control">
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="alamat">
                                    <b>Alamat<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input required type="text" name="alamat" class="form-control">
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="kode_pos">
                                    <b>Kode Pos<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input required type="text" name="kode_pos" class="form-control">
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="telepon">
                                    <b>Telepon<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input required type="text" name="telepon" class="form-control">
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="semester">
                                    <b>Semester<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input required type="number" min="1" name="semester" class="form-control">
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="nomor_rekening">
                                    <b>Nomor Rekening<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <input required type="text" name="nomor_rekening" class="form-control">
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="jurusan">
                                    <b>Jurusan<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <?php  
                                    $options = [ '' => 'Pilih Jurusan' ];
                                foreach ($jurusan as $row)
                                {
                                    $options[$row->id] = $row->nama;
                                }
                                    echo form_dropdown('jurusan', $options, $mahasiswa->jurusan ?? null, [ 'required' => 'required', 'class' => 'form-control' ]);
                                ?>
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="prestasi">
                                    <b>Prestasi<span style="color: red;">*</span></b>
                                </label>
                            </div>
                            <div class="col-md-10">
                                <?php  
                                    $options = [ 
                                        ''                  => 'Pilih Lingkup Prestasi',
                                        'Internasional'     => 'Internasional',
                                        'Nasional'          => 'Nasional'
                                    ];
                                    echo form_dropdown('prestasi', $options, '', [ 'required' => 'required', 'class' => 'form-control' ]);
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

                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.id.min.js"></script>

                    <script type="text/javascript">
                        $('input[name=tanggal_lahir]').datepicker({
                            format: 'yyyy-mm-dd',
                            language: 'id'
                        });
                    </script>      
                </div>
            </div>
        </div>
    </div>
