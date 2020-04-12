<?php 
require '../include.php';
require 'layouts/header.php'; 
$siswa = query("SELECT * FROM siswa");

?>

<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->
  <hr/>
  <div class="container-fluid">
  	<div class="row-fluid">
  		<div class="span12">
  			<div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Data Siswa</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
				<a href="tambahDataSiswa.php " class="btn btn-primary">Tambah Data</a>
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Siswa</th>
						<th>NIS</th>
						<th>NISN</th>
						<th>No.Telp</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<?php foreach($siswa as $p) : ?>
					<tr>
						<td><?php echo $i++;  ?></td>
						<td><?php echo $p["nama"]; ?></td>
						<td><?php echo $p["nis"]; ?></td>
						<td><?php echo $p["nisn"]; ?></td>
						<td><?php echo $p["no_telp"]; ?></td>
						<td>
							<a href="hapusSiswa.php?id=<?php echo $p["id_siswa"] ?>" class="btn btn-danger">Hapus</a>
							<a href="updateSiswa.php?id=<?php echo $p["id_siswa"] ?>" class="btn btn-info">Update</a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
            </table>
          </div>
        </div>
  		</div>
  	</div>
  </div>
</div>

<!-- <div class="container mt-5">
	<div class="row">
		<div class="col-md-12">
			<h2 class="text-center">Data Siswa</h2>
		</div>
		<div class="col-md-12">
			<table class="table table-bordered mt-3">
				<a href="tambahDataSiswa.php " class="btn btn-primary">Tambah Data</a>
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Siswa</th>
						<th>NIS</th>
						<th>No.Telp</th>
						<th>Status</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<?php foreach($siswa as $p) : ?>
					<tr>
						<td><?php echo $i++;  ?></td>
						<td><?php echo $p["nama"]; ?></td>
						<td><?php echo $p["nis"]; ?></td>
						<td><?php echo $p["no_telp"]; ?></td>
						<td><?php echo $p["status"]; ?></td>
						<td>
							<a href="hapusSiswa.php?id=<?php echo $p["id_siswa"] ?>" class="btn btn-danger">Hapus</a>
							<?php if($p["status"] === "belum-lunas") : ?>
							<a href="kirimKonfirmasi.php?id=<?php echo $p["id_siswa"] ?>&id_petugas=<?php echo $_SESSION["petugas"]["id_petugas"] ?>" onclick="confirm('Apakah anda yakin ingin mengkonfirmasi')" class="btn btn-success">Konfirmasi</a>
							<?php else: ?>
							<a href="cetak.php?nisn=<?php echo $p["nisn"] ?>" target="_blank" class="btn btn-warning">Cetak</a>	
							<?php endif; ?>
							<a href="updateSiswa.php?id=<?php echo $p["id_siswa"] ?>" class="btn btn-info">Update</a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div> -->

<?php require 'layouts/footer.php'; ?>