        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active">Hasil Segmentasi</li>
        </ol>
            <!-- <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Report  </h1>
                </div>
            </div> -->
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="text-center">Tambah Data Pelanggan</h5>
                        </div>
                        <div class="card-body">
                            <style type="text/css">
                                tr th, tr td {text-align: center;}
                            </style>
                            <table class="table table-bordered table-responsive" >
                                <thead>
                                    <tr>
                                        <!-- <th>No</th> -->
                                        <th>Company</th>
                                        <th>Segmen</th>
                                        <th style="width: 100px!important;">Recency</th>
                                        <th>Frequency</th>
                                        <th>Monetary</th>
                                        <th>Periode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?= form_open('admin/hasil'); ?>
                                    <tr>
                                        <td><input type="text" name="nama" class="form-control"></td>
                                        <td><input type="text" name="segmen" class="form-control"></td>
                                        <td><input type="date" name="r" class="form-control"></td>
                                        <td><input type="number" name="f" class="form-control"></td>
                                        <td><input type="number" name="m" class="form-control"></td>
                                        <td><select name="periode" class="form-control">
                                            <?php foreach ($this->Periode_m->get() as $p): ?>
                                                
                                            <option value="<?= $p->id ?>"><?= $p->nama ?></option>
                                            <?php endforeach ?>
                                        </select></td>
                                        
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="vertical-align: left;"><input type="submit" value="Simpan" name="simpan" class="btn btn-success"></td>
                                    </tr>
                                    <?= form_close(); ?>  
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="text-center">Tabel Data</h3>
                        </div>
                        <div class="card-body">
                            <!-- <?=form_open('admin/hasil'); ?> -->
                            <div class="form-group">
                                <label for="">Pilih Periode</label>
                                <select name="periode" class="form-control" id="periode">
                                    <option value="0">== Semua ==</option>
                                    <?php foreach ($this->Periode_m->get() as $p): ?>         
                                    <option value="<?= $p->id ?>"><?= $p->nama ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info" onclick="_get()">Pilih</button>
                            </div>
                            <!-- <?= form_close() ?> -->
                            <hr>
                            <style type="text/css">
                                tr th, tr td {text-align: center;}
                            </style>
                                                                                         
                            <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#add"><i class="glyphicon glyphicon-plus"></i> Tambah</button><hr> -->
                            
                            <table class="table table-bordered table-striped table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <!-- <th>No</th> -->
                                        <th>Company</th>
                                        <th>Recency</th>
                                        <th>Frequency</th>
                                        <th>Monetary</th>
                                        <th>Segmen</th>
                                        <th>Periode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($data as $key): ?>
                                        <?php foreach ($key as $value => $k): ?>
                                            <?php $comp = $this->Transaksi_m->get_row(['company' => $value]); ?>
                                             <tr>
                                                <td><?= $comp->company ?></td>
                                                <td><?= $comp->date_most_recent ?></td>
                                                <td><?= $comp->transaction_count ?></td>
                                                <td><?= $comp->amount ?></td>
                                                <td><?= $i ?></td>
                                                <td><?= ($this->Periode_m->get_row(['id' => $comp->periode ])) ? $this->Periode_m->get_row(['id' => $comp->periode ])->nama : '-' ?></td>
                                            </tr>   
                                        <?php endforeach ?>
                                    <?php $i++; endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

<script>
    function _get() {
        var id = $("#periode").val();
        // alert(id);
        window.location.href = '<?= base_url('admin/hasil') ?>' + '/' + id; 
        // body...
    }
</script>