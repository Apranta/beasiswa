<div class="container">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('admin') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('admin/data-keluarga') ?>">Data Keluarga</a>
        </li>
        <li class="breadcrumb-item active">Detail Keluarga</li>
    </ol>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5>Detail Data Keluarga</h5>
                </div>
                <div class="card-body">
                    <style type="text/css">
                        tr th, tr td {text-align: left;}
                        table{
                            width: 100% !important;
                        }
                        .pd{padding-left: 5% !important;}
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
                                <th colspan="2">Data Ayah</th>
                            </tr>
                            <tr>
                                <th class="pd">Nama</th>
                                <td><?php echo $data->n_ayah ?></td>
                            </tr>
                            <tr>
                                <th class="pd">Usia</th>
                                <td><?php echo $data->usia_ayah ?></td>
                            </tr>
                            <tr>
                                <th class="pd">Agama</th>
                                <td><?php echo $data->agama_ayah ?></td>
                            </tr>
                            <tr>
                                <th class="pd">Pekerjaan</th>
                                <td><?php echo $data->pekerjaan_ayah ?></td>
                            </tr>
                            <tr>
                                <th class="pd">Status</th>
                                <td><?php echo $data->status_ayah ?></td>
                            </tr>
                            <tr>
                                <th class="pd">Alamat</th>
                                <td><?php echo $data->alamat_ayah ?></td>
                            </tr>
                            <tr>
                                <th colspan="2">Data Ibu</th>
                            </tr>
                            <tr>
                                <th class="pd">Nama</th>
                                <td><?php echo $data->n_ibu ?></td>
                            </tr>
                            <tr>
                                <th class="pd">Usia</th>
                                <td><?php echo $data->usia_ibu ?></td>
                            </tr>
                            <tr>
                                <th class="pd">Agama</th>
                                <td><?php echo $data->agama_ibu ?></td>
                            </tr>
                            <tr>
                                <th class="pd">Pekerjaan</th>
                                <td><?php echo $data->pekerjaan_ibu ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah Anak</th>
                                <td><?php echo $data->jumlah_anak ?></td>
                            </tr>
                            <tr>
                                <th>Anak Ke</th>
                                <td><?php echo $data->anak_ke ?></td>
                            </tr>
                            <tr>
                                <th>Penghasilan</th>
                                <td><?php echo $data->penghasilan ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><?php echo $data->status_ibu ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?php echo $data->alamat_ibu ?></td>
                            </tr>
                            <tr>
                                <th>Kepemilikan Rumah</th>
                                <td><?php echo $data->kepemilikan_rumah ?></td>
                            </tr>
                            <tr>
                                <th>Daya Listrik</th>
                                <td><?php echo $data->daya_listrik ?></td>
                            </tr>
                            <tr>
                                <th>Sumber Air</th>
                                <td><?php echo $data->sumber_air ?></td>
                            </tr>
                            <tr>
                                <th>Saudara</th>
                                <td>
                                    <ul>
                                        <?php foreach(json_decode($data->saudara) as $row): ?>
                                            <li><?php echo $row->nama ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>
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
