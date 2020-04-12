<?php 
require '../include.php';
require 'layouts/header.php'; 
$petugas = query("SELECT * FROM petugas WHERE level = 'petugas'");

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
            <h5>Data Petugas</h5>
          </div>
          <div class="widget-content nopadding">
          	<a href="tambahDataPetugas.php" class="btn btn-primary mb-2">Tambah Data</a>
            <table class="table table-bordered table-striped">
			<thead>
					<tr>
						<th>No</th>
						<th>Username</th>
						<th>Nama Petugas</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<?php foreach($petugas as $p) : ?>
					<tr>
						<td><?php echo $i++;  ?></td>
						<td><?php echo $p["username"]; ?></td>
						<td><?php echo $p["nama_petugas"]; ?></td>
						<td>
							<a href="hapusPetugas.php?id=<?php echo $p["id_petugas"] ?>" onclick="confirm('Apakah anda yakin menghapus')" class="btn btn-danger">Hapus</a>
							<a href="updatePetugas.php?id=<?php echo $p["id_petugas"] ?>"  class="btn btn-info">Update</a>
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