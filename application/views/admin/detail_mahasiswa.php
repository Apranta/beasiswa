<div class="container">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('admin') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('admin/data-mahasiswa') ?>">Data Mahasiswa</a>
        </li>
        <li class="breadcrumb-item active">Detail Mahasiswa</li>
    </ol>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5>Detail Data Mahasiswa</h5>
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
                        <tbody>
                            <tr>
                                <th>NIM</th>
                                <td><?php echo $data->nim ?></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td><?php echo $data->nama ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?php echo $data->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td><?php echo $data->agama ?></td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td><?php echo $data->tempat_lahir ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td><?php echo $data->tanggal_lahir ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?php echo $data->alamat ?></td>
                            </tr>
                            <tr>
                                <th>Kode Pos</th>
                                <td><?php echo $data->kode_pos ?></td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td><?php echo $data->telepon ?></td>
                            </tr>
                            <tr>
                                <th>Jurusan</th>
                                <td><?php echo $this->jurusan_m->get_row(['id' => $data->jurusan])->nama ?></td>
                            </tr>
                            <tr>
                                <th>Semester</th>
                                <td><?php echo $data->semester ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Rekening</th>
                                <td><?php echo $data->nomor_rekening ?></td>
                            </tr>
                            <tr>
                                <th>Prestasi</th>
                                <td><?php echo $data->prestasi ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
