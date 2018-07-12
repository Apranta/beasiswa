        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= base_url('admin') ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Data Keluarga</li>
        </ol>
            <div class="row">
                <div class="col-lg-12">
                    <a href="<?= base_url('admin/tambah-keluarga') ?>" class="btn btn-success" style="margin-bottom: 3%;"> <i class="fa fa-plus"></i> Tambah</a>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5>Data Keluarga</h5>
                        </div>
                        <div class="card-body">
                            <style type="text/css">
                                tr th, tr td {text-align: center;}
                                table{
                                    width: 100% !important;
                                }
                            </style>
                            <div>
                                <?= $this->session->flashdata('msg') ?>
                            </div>
                            <table class="table table-bordered"  width="100%">
                                <thead>
                                    <tr>
                                        <!-- <th>No</th> -->
                                        <th></th>
                                        <th>NIM</th>
                                        <th>Nama Ayah</th>
                                        <th>Nama Ibu</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0; foreach ($data as $row): ?>
                                    <tr>
                                        <td><?php echo ++$i ?></td>
                                        <td><?php echo $row->nim ?></td>
                                        <td><?php echo $row->n_ayah ?></td>
                                        <td><?php echo $row->n_ibu ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/detail_keluarga/'.$row->nim) ?>" class="btn btn-primary"><i class="fa fa-info"></i> Detail</a>
                                            <a href="<?php echo base_url('admin/edit-keluarga/'.$row->nim) ?>" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="<?php echo base_url('admin/data-keluarga/'.$row->nim) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>   
                                    <?php endforeach ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
