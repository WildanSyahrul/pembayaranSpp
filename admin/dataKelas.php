<?php 
require '../include.php';
require 'layouts/header.php'; 
$petugas = query("SELECT * FROM kelas");

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
            <h5>Data Kelas</h5>
          </div>
          <div class="widget-content nopadding">
			<table class="table table-bordered mt-3">
				<a href="tambahDataKelas.php " class="btn btn-primary">Tambah Data</a>
				<thead>
					<tr>
						<th>No</th>
						<th>Kelas</th>
						<th>Kompetensi Keahlian</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<?php foreach($petugas as $p) : ?>
					<tr>
						<td><?php echo $i++;  ?></td>
						<td><?php echo $p["nama_kelas"]; ?></td>
						<td><?php echo $p["kompetensi_keahlian"]; ?></td>
						<td>
							<a href="hapusKelas.php?id=<?php echo $p["id_kelas"] ?>" class="btn btn-danger">Hapus</a>
							<a href="updateKelas.php?id=<?php echo $p["id_kelas"] ?>" class="btn btn-info">Update</a>
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

<?php require 'layouts/footer.php'; ?>