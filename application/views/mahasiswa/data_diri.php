<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css.map">

<?php echo $this->session->flashdata('msg') ?>

<?php echo form_open('mahasiswa/data-diri') ?>

<div class="form-group">
    <div class="row">
        <div class="col-md-2">
            <label for="nama">
                <b>Nama Lengkap<span style="color: red;">*</span></b>
            </label>
        </div>
        <div class="col-md-10">
            <input required type="text" name="nama" value="<?php echo $mahasiswa->nama ?? null ?>" class="form-control">
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
            <input required type="text" name="nim" value="<?php echo $nim ?>" readonly class="form-control">
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
            <input required type="radio" name="jenis_kelamin" value="L" <?php echo $mahasiswa->jenis_kelamin == 'L' ? 'checked' : '' ?>> Laki-laki 
            <input required type="radio" name="jenis_kelamin" value="P" <?php echo $mahasiswa->jenis_kelamin == 'P' ? 'checked' : '' ?>> Perempuan 
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
            <input required type="text" name="agama" value="<?php echo $mahasiswa->agama ?? null ?>" class="form-control">
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
            <input required type="text" name="tempat_lahir" value="<?php echo $mahasiswa->tempat_lahir ?? null ?>" class="form-control">
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
            <input required readonly type="text" name="tanggal_lahir" value="<?php echo $mahasiswa->tanggal_lahir ?? null ?>" class="form-control">
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
            <input required type="text" name="alamat" value="<?php echo $mahasiswa->alamat ?? null ?>" class="form-control">
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
            <input required type="text" name="kode_pos" value="<?php echo $mahasiswa->kode_pos ?? null ?>" class="form-control">
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
            <input required type="text" name="telepon" value="<?php echo $mahasiswa->telepon ?? null ?>" class="form-control">
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
            <input required type="number" min="1" name="semester" value="<?php echo $mahasiswa->semester ?? null ?>" class="form-control">
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
            <input required type="text" name="nomor_rekening" value="<?php echo $mahasiswa->nomor_rekening ?? null ?>" class="form-control">
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
            <input required type="text" name="prestasi" value="<?php echo $mahasiswa->prestasi ?? null ?>" class="form-control">
        </div>
    </div>    
</div>

<div class="form-group">
    <div class="row">
        <div class="offset-md-2 col-md-10">
            <input type="submit" name="submit" value="Perbaharui" class="btn btn-primary">
            <a href="<?php echo base_url('mahasiswa/data-keluarga') ?>" class="btn btn-primary">Selanjutnya</a>
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
