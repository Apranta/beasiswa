<?php echo $this->session->flashdata('msg') ?>

<h2>Data Keluarga</h2>
<hr>
<?php echo form_open('mahasiswa/data-keluarga') ?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="n_ayah">
                <b>Nama Ayah<span style="color: red;">*</span></b>
            </label>
            <input type="text" class="form-control" value="<?php echo $keluarga->n_ayah ?? null ?>" name="n_ayah" required>
        </div>
        <div class="form-group">
            <label for="alamat_ayah">
                <b>Alamat Ayah<span style="color: red;">*</span></b>
            </label>
            <textarea class="form-control" name="alamat_ayah" value="<?php echo $keluarga->alamat_ayah ?? null ?>" required><?php echo $keluarga->alamat_ayah ?? null ?></textarea>
        </div>
        <div class="form-group">
            <label for="agama_ayah">
                <b>Agama Ayah<span style="color: red;">*</span></b>
            </label>
            <input type="text" class="form-control" value="<?php echo $keluarga->agama_ayah ?? null ?>" name="agama_ayah" required>
        </div>
        <div class="form-group">
            <label for="pekerjaan_ayah">
                <b>Pekerjaan Ayah<span style="color: red;">*</span></b>
            </label>
            <input type="text" class="form-control" value="<?php echo $keluarga->pekerjaan_ayah ?? null ?>" name="pekerjaan_ayah" required>
        </div>
        <div class="form-group">
            <label for="usia_ayah">
                <b>Usia Ayah<span style="color: red;">*</span></b>
            </label>
            <input type="number" min="1" class="form-control" value="<?php echo $keluarga->usia_ayah ?? null ?>" name="usia_ayah" required>
        </div>
        <div class="form-group">
            <label for="status_ayah">
                <b>Status Ayah<span style="color: red;">*</span></b>
            </label>
            <input type="text" class="form-control" value="<?php echo $keluarga->status_ayah ?? null ?>" name="status_ayah" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="n_ibu">
                <b>Nama Ibu<span style="color: red;">*</span></b>
            </label>
            <input type="text" class="form-control" value="<?php echo $keluarga->n_ibu ?? null ?>" name="n_ibu" required>
        </div>
        <div class="form-group">
            <label for="alamat_ibu">
                <b>Alamat Ibu<span style="color: red;">*</span></b>
            </label>
            <textarea class="form-control" name="alamat_ibu" value="<?php echo $keluarga->alamat_ibu ?? null ?>" required><?php echo $keluarga->alamat_ibu ?? null ?></textarea>
        </div>
        <div class="form-group">
            <label for="agama_ibu">
                <b>Agama Ibu<span style="color: red;">*</span></b>
            </label>
            <input type="text" class="form-control" value="<?php echo $keluarga->agama_ibu ?? null ?>" name="agama_ibu" required>
        </div>
        <div class="form-group">
            <label for="pekerjaan_ibu">
                <b>Pekerjaan Ibu<span style="color: red;">*</span></b>
            </label>
            <input type="text" class="form-control" value="<?php echo $keluarga->pekerjaan_ibu ?? null ?>" name="pekerjaan_ibu" required>
        </div>
        <div class="form-group">
            <label for="usia_ibu">
                <b>Usia Ibu<span style="color: red;">*</span></b>
            </label>
            <input type="number" min="1" class="form-control" value="<?php echo $keluarga->usia_ibu ?? null ?>" name="usia_ibu" required>
        </div>
        <div class="form-group">
            <label for="status_ibu">
                <b>Status Ibu<span style="color: red;">*</span></b>
            </label>
            <input type="text" class="form-control" value="<?php echo $keluarga->status_ibu ?? null ?>" name="status_ibu" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="jumlah_anak">
                <b>Jumlah Anak<span style="color: red;">*</span></b>
            </label>
            <input type="number" min="1" required name="jumlah_anak" value="<?php echo $keluarga->jumlah_anak ?? null ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="anak_ke">
                <b>Anak-ke<span style="color: red;">*</span></b>
            </label>
            <input type="number" min="1" value="<?php echo $keluarga->anak_ke ?? null ?>" required name="anak_ke" class="form-control">
        </div>
        <div class="form-group">
            <label for="penghasilan">
                <b>Penghasilan<span style="color: red;">*</span></b>
            </label>
            <input type="number" min="0" required name="penghasilan" value="<?php echo $keluarga->penghasilan ?? null ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="kepemilikan_rumah">
                <b>Kepemilikan Rumah<span style="color: red;">*</span></b>
            </label>
            <input type="text" required name="kepemilikan_rumah" value="<?php echo $keluarga->kepemilikan_rumah ?? null ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="daya_listrik">
                <b>Daya Listrik<span style="color: red;">*</span></b>
            </label>
            <input type="number" min="0" step="any" value="<?php echo $keluarga->daya_listrik ?? null ?>" required name="daya_listrik" class="form-control">
        </div>
        <div class="form-group">
            <label for="sumber_air">
                <b>Sumber Air<span style="color: red;">*</span></b>
            </label>
            <input type="text" required name="sumber_air" value="<?php echo $keluarga->sumber_air ?? null ?>" class="form-control">
        </div>
    </div>
</div>

<hr>
<button type="button" class="btn btn-success" id="tambah-saudara-button"><i class="fa fa-plus"></i></button>
<br>
<div id="saudara-form">
    <?php  
    if (isset($keluarga->saudara) && count(json_decode($keluarga->saudara)) > 0) {
        $keluarga->saudara = json_decode($keluarga->saudara);
        foreach ($keluarga->saudara as $saudara)
        {
            ?>
            <div class="row">
                <div class="col-md-3">
                    <label for="nama_saudara[]">
                        <b>Nama Saudara</b>
                    </label>
                    <input type="text" name="nama_saudara[]" value="<?php echo $saudara->nama ?? null ?>" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="usia[]">
                        <b>Usia Saudara</b>
                    </label>
                    <input type="number" name="usia_saudara[]" value="<?php echo $saudara->usia ?? null ?>" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="status_saudara[]">
                        <b>Status Saudara</b>
                    </label>
                    <input type="text" name="status_saudara[]" value="<?php echo $saudara->status ?? null ?>" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="pekerjaan_saudara[]">
                        <b>Pekerjaan Saudara</b>
                    </label>
                    <input type="text" name="pekerjaan_saudara[]" value="<?php echo $saudara->pekerjaan ?? null ?>" class="form-control">
                </div>
                <div class="col-md-1">
                    <label><b>Hapus</b></label><br>
                    <button style="margin: auto 0;" type="button" class="btn btn-danger btn-xs" onclick="$(this).parent().parent().remove()"><i class="fa fa-trash"></i></button>
                </div>
            </div>
            <hr>
            <?php
        }
    } 
    else
    {
        ?>
        <div class="row">
            <div class="col-md-3">
                <label for="nama_saudara[]">
                    <b>Nama Saudara</b>
                </label>
                <input type="text" name="nama_saudara[]" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="usia[]">
                    <b>Usia Saudara</b>
                </label>
                <input type="number" name="usia_saudara[]" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="status_saudara[]">
                    <b>Status Saudara</b>
                </label>
                <input type="text" name="status_saudara[]" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="pekerjaan_saudara[]">
                    <b>Pekerjaan Saudara</b>
                </label>
                <input type="text" name="pekerjaan_saudara[]" class="form-control">
            </div>
            <div class="col-md-1">
                <label><b>Hapus</b></label><br>
                <button style="margin: auto 0;" type="button" class="btn btn-danger btn-xs" onclick="$(this).parent().parent().remove()"><i class="fa fa-trash"></i></button>
            </div>
        </div>
        <hr>
    <?php } ?>
</div>
<br>
<div class="form-group">
    <div class="row">
        <div class="col-md-12 text-center">
            <input type="submit" name="submit" value="Perbaharui" class="btn btn-primary">
            <a href="<?php echo base_url('mahasiswa/pengajuan-beasiswa') ?>" class="btn btn-primary">Selanjutnya</a>
        </div>
    </div>
</div>

<?php echo form_close() ?>


<script type="text/javascript">
    $(document).ready(function() {
        $('#tambah-saudara-button').on('click', function() {
            $('#saudara-form').append(<?php echo json_encode(
                '<div class="row">
                <div class="col-md-3">
                    <label for="nama_saudara[]">
                        <b>Nama Saudara</b>
                    </label>
                    <input type="text" name="nama_saudara[]" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="usia[]">
                        <b>Usia Saudara</b>
                    </label>
                    <input type="number" name="usia_saudara[]" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="status_saudara[]">
                        <b>Status Saudara</b>
                    </label>
                    <input type="text" name="status_saudara[]" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="pekerjaan_saudara[]">
                        <b>Pekerjaan Saudara</b>
                    </label>
                    <input type="text" name="pekerjaan_saudara[]" class="form-control">
                </div>
                <div class="col-md-1">
                    <label><b>Hapus</b></label><br>
                    <button style="margin: auto 0;" type="button" class="btn btn-danger btn-xs" onclick="$(this).parent().parent().remove()"><i class="fa fa-trash"></i></button>
                </div>
            </div><hr>'
            ) ?>);
        });
    });
</script>
