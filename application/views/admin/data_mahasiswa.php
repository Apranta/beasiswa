        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active">Data Mahasiswa</li>
        </ol>
            <div class="row">
                <div class="col-lg-12">
                    <a href="<?= base_url('admin/tambah-mahasiswa') ?>" class="btn btn-success" style="margin-bottom: 3%;"> <i class="fa fa-plus"></i> Tambah</a>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="text-center">Data Mahasiswa</h5>
                        </div>
                        <div class="card-body">
                            <style type="text/css">
                                tr th, tr td {text-align: center;}
                                table{
                                    width: 100% !important;
                                }
                            </style>
                            <table class="table table-bordered " width="100%">
                                <thead>
                                    <tr>
                                        <!-- <th>No</th> -->
                                        <th></th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Semester</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0; foreach ($data as $mhs): ?>
                                    <tr>
                                        <td><?php echo ++$i ?></td>
                                        <td><?php echo $mhs->nama ?></td>
                                        <td><?php echo $mhs->jenis_kelamin ?></td>
                                        <td><?php echo $mhs->semester ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/detail_mahasiswa/'.$mhs->nim) ?>" class="btn btn-primary">Detail</a>
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
