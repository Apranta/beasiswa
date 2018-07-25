<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tanda Terima Berkas</title><!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

</head>
<body>
	<br>
	<table>
		<tbody>
			<tr>
				<td><img style="width: 95px; height: 95px; border: none;" src="<?= base_url('assets/img/polsri.jpg') ?>" class="img img-thumbnail"></td>
				<td><h4>KEMENTERIAN RISTEK DAN DIKTI<br>
				POLITEKNIK NEGERI SRIWIJAYA<br>
				UNIT KEMAHASISWAAN
			</h4></td>
			</tr>
		</tbody>
	</table>
	<style>
    	table{
    		text-align: center;
    		width: 100%;
    	}
    	
    </style>
    	<style type="text/css">
                                tr th, tr td {text-align: center;}
                            </style>
    <br><br><br><br><br><br>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th colspan="2">TANDA TERIMA BERKAS<br>BEASISWA PPA</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="width: 100px; text-align: center;">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td style="width: 100px;text-align: center!important;">No Berkas</td>
						<td><?= rand(); ?></td>
					</tr>
					<tr>
						<td style="width: 100px;text-align: center!important;">Nama</td>
						<td><?= $data->nama ?></td>
					</tr>
					<tr>
						<td style="width: 100px;text-align: center!important;">Nomor</td>
						<td><?= $data->nim?></td>
					</tr>
					<tr>
						<td style="width: 100px;text-align: center!important;">Jurusan</td>
						<td><?= $this->Jurusan_m->get_row(['id_jurusan' => $data->jurusan])->nama ?></td>
					</tr>
					<tr>
						<td style="width: 100px;text-align: center!important;">Tanggal</td>
						<td><?= $this->tanggal->convert_date(date("Y-m-d")) ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div style="height: 100px;">
	</div>
	<div class="row">
		<div class="col-md-2" align="center">
			<h4>Yang Menerima</h4><br>
			<br><br><br><br>
			...................<br>
			NIP,
		</div>
	</div>
</body>
</html>