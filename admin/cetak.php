<?php 
require '../include.php';
require 'layouts/header.php'; 
$nisn = $_GET["nisn"];
$pembayaran = query("SELECT * FROM pembayaran WHERE nisn = '$nisn'")[0];
$siswa = query("SELECT * FROM siswa WHERE nisn = '$nisn'")[0];
?>

<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->
  <hr/>
  <h1 class="text-center">Cetak Pembayaran SPP</h1>
  <div class="container-fluid">
  	<div class="row-fluid">
  		<div class="span12">
  						<table class="table table-striped">
				<tr>
					<td>Nama Siswa</td>
					<td><?php echo $siswa["nama"]; ?></td>
				</tr>
				<tr>
					<td>NISN</td>
					<td><?php echo $pembayaran["nisn"]; ?></td>
				</tr>
				<tr>
					<td>Tanggal Pembayaran</td>
					<td><?php echo $pembayaran["tgl_bayar"]; ?></td>
				</tr>
								<tr>
					<td>Status</td>
					<td><?php echo $pembayaran["status"]; ?></td>
				</tr>
				<tr>
					<td>Jumlah Pembayaran</td>
					<td>Rp.<?php echo number_format($pembayaran["jumlah_bayar"],0,',','.'); ?></td>
				</tr>

			</table>
			<button class="btn btn-block btn-primary" onclick="window.print()">Cetak PDF</button>
  		</div>
  	</div>
  </div>
 </div>
