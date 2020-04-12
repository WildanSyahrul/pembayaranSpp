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
            <h5>Pembayaran</h5>
          </div>
          <div class="widget-content nopadding">
			<!--start-top-serch-->
			<form method="post" action="">
					<div id="search">
			  <input type="text" name="nisn" placeholder="Search here..."/>
			  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
			</div>
			</form>
			<!--close-top-serch--> 
          <?php if(isset($_POST["nisn"])) : ?>
          <div class="col-md-12 mt-5 mb-5">
          <h2>Hasil Pencarian NISN : <?php echo $_POST["nisn"]; ?></h2>
          <?php 
          $pembayaran = query("SELECT * FROM pembayaran WHERE nisn = '$_POST[nisn]'"); ?>
              <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Status</th>
                <th>Pilihan</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; ?>
              <?php foreach($pembayaran as $p) : ?>
              <tr>
                <td><?php echo $i++;  ?></td>
                <td><?php echo $p["nisn"]; ?></td>
                <td><?php echo $p["status"]; ?></td>
                <td>
                  <?php if($p["status"] === "lunas") : ?>
                 
                  <a href="cetak.php?nisn=<?php echo $p["nisn"] ?>" class="btn btn-danger btn-sm" target="_blank">Cetak PDF</a>
                  <?php else: ?>
                    <a href="tambahPembayaran.php?id=<?php echo $p["id_pembayaran"] ?>" class="btn btn-info btn-sm">Kirim Pembayaran</a>
                <?php endif; ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
                  </table>

  
        
            </div>

          </div>
       
        <?php endif; ?>

          </div>
        </div>
  		</div>
  	</div>
  </div>
</div>

<?php require 'layouts/footer.php'; ?>