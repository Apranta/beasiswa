<div class="container">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= base_url('admin') ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?= base_url('admin/data-keluarga') ?>">Data Keluarga</a>
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
                        <?= $this->session->flashdata('msg') ?>
                    </div>
                    <table class="table table-bordered"  width="100%">
                        <tbody>
                            <tr>
                                <th>NIM</th>
                                <td><?= $data->nim ?></td>
                            </tr>
                            <tr>
                                <th colspan="2">Data Ayah</th>
                            </tr>
                            <tr>
                                <th class="pd">Nama</th>
                                <td><?= $data->n_ayah ?></td>
                            </tr>
                            <tr>
                                <th class="pd">Usia</th>
                                <td><?= $data->usia_ayah ?></td>
                            </tr>
                            <tr>
                                <th class="pd">Agama</th>
                                <td><?= $data->agama_ayah ?></td>
                            </tr>
                            <tr>
                                <th class="pd">Pekerjaan</th>
                                <td><?= $data->pekerjaan_ayah ?></td>
                            </tr>
                            <tr>
                                <th class="pd">Status</th>
                                <td><?= $data->status_ayah ?></td>
                            </tr>
                            <tr>
                                <th class="pd">Alamat</th>
                                <td><?= $data->alamat_ayah ?></td>
                            </tr>
                            <tr>
                                <th colspan="2">Data Ibu</th>
                            </tr>
                            <tr>
                                <th class="pd">Nama</th>
                                <td><?= $data->n_ibu ?></td>
                            </tr>
                            <tr>
                                <th class="pd">Usia</th>
                                <td><?= $data->usia_ibu ?></td>
                            </tr>
                            <tr>
                                <th class="pd">Agama</th>
                                <td><?= $data->agama_ibu ?></td>
                            </tr>
                            <tr>
                                <th class="pd">Pekerjaan</th>
                                <td><?= $data->pekerjaan_ibu ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah Anak</th>
                                <td><?= $data->jumlah_anak ?></td>
                            </tr>
                            <tr>
                                <th>Anak Ke</th>
                                <td><?= $data->anak_ke ?></td>
                            </tr>
                            <tr>
                                <th>Penghasilan</th>
                                <td><?= $data->penghasilan ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><?= $data->status_ibu ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= $data->alamat_ibu ?></td>
                            </tr>
                            <tr>
                                <th>Kepemilikan Rumah</th>
                                <td><?= $data->kepemilikan_rumah ?></td>
                            </tr>
                            <tr>
                                <th>Daya Listrik</th>
                                <td><?= $data->daya_listrik ?></td>
                            </tr>
                            <tr>
                                <th>Sumber Air</th>
                                <td><?= $data->sumber_air ?></td>
                            </tr>
                            <tr>
                                <th>Saudara</th>
                                <td>
                                    <ul>
                                        <?php foreach(json_decode($data->saudara) as $row): ?>
                                            <li><?= $row->nama ?></li>
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