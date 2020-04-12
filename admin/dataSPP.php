<?php 
require '../include.php';
require 'layouts/header.php'; 
$spp = query("SELECT * FROM spp");

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
            <h5>Data SPP</h5>
          </div>
          <div class="widget-content nopadding">
			<table class="table table-bordered mt-3">
			<a href="tambahSPP.php " class="btn btn-primary">Tambah Data</a>
				<thead>
					<tr>
						<th>No</th>
						<th>Tahun</th>
						<th>Nominal</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<?php foreach($spp as $p) : ?>
					<tr>
						<td><?php echo $i++;  ?></td>
						<td><?php echo $p["tahun"]; ?></td>
						<td>Rp.<?php echo number_format($p["nominal"],0,',','.'); ?></td>
						<td>
							<a href="hapusSPP.php?id=<?php echo $p["id_spp"] ?>" class="btn btn-danger">Hapus</a>
							<a href="updateSPP.php?id=<?php echo $p["id_spp"] ?>" class="btn btn-info">Update</a>
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