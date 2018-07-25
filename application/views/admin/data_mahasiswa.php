        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url('admin') ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Data Mahasiswa</li>
        </ol>
            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url('admin/tambah-mahasiswa') ?>" class="btn btn-success" style="margin-bottom: 3%;"> <i class="fa fa-plus"></i> Tambah</a>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5>Data Mahasiswa</h5>
                        </div>
                        <div class="card-body">
                            <style type="text/css">
                                tr th, tr td {text-align: center;}
                                table{
                                    width: 100% !important;
                                }
                            </style>
                            <div>
                                <?php echo $this->session->flashdata('msg') ?>
                            </div>
                            <table class="table table-bordered"  width="100%">
                                <thead>
                                    <tr>
                                        <!-- <th>No</th> -->
                                        <th></th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Semester</th>
                                        <th>Skor</th>
                                        <th>Kriteria</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0; foreach ($data as $mhs): ?>
                                    <tr>
                                        <td><?php echo ++$i ?></td>
                                        <td><?php echo $mhs->nama ?></td>
                                        <td><?php echo $mhs->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                        <td><?php echo $mhs->semester ?></td>
                                        <td><?php echo $mhs->skor ?></td>
                                        <td><?php echo $mhs->predikat ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/detail_mahasiswa/'.$mhs->nim) ?>" class="btn btn-primary"><i class="fa fa-info"></i> Detail</a>
                                            <a href="<?php echo base_url('admin/edit-mahasiswa/'.$mhs->nim) ?>" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="<?php echo base_url('admin/data-mahasiswa/'.$mhs->nim) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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
