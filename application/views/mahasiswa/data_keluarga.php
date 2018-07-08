<?php echo $this->session->flashdata('msg') ?>

<?php echo form_open('mahasiswa/data-keluarga') ?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="n_ayah">
                <b>Nama Ayah<span style="color: red;">*</span></b>
            </label>
            <input type="text" class="form-control" name="n_ayah" required>
        </div>
    </div>
    <div class="col-md-6">
        
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
