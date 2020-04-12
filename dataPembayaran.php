<?php 
session_start();
require '../functions.php';
require 'layouts/header.php'; 

?>

<div class="main-content">
<?php require 'layouts/navbar.php' ?>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
       	<div class="row">
       		<div class="col-md-12">
       			<h1 class="text-white">Halaman Data Pembayaran</h1>
       		</div>
       	</div>
      </div>
    </div>

       <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Data Pembayaran</h3>
            </div>
          	<div class="card-body">
          <div class="container">
          <div class="row">
            <div class="col-md-8 offset-md-2">
            <form method="post" action="" autocomplete="off">
            <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" name="nisn" placeholder="Masukkan nisn....." aria-label="Search">
            <div class="input-group-prepend">
              <button class="btn btn-info" name="submit" type="submit">Cari <i class="fa fa-search"></i></button>
            </div>
            </div>
            </form>
            
          </div>
          <?php if(isset($_POST["nisn"])) : ?>
          <div class="col-md-12 mt-5 mb-5">
          <h2>Hasil Pencarian NISN : <?php echo $_POST["nisn"]; ?></h2>
          <?php $pembayaran = query("SELECT * FROM tb_pembayaran WHERE nisn = '$_POST[nisn]'"); ?>
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
                  <a href="cetak.php?id=<?php echo $p["id_pembayaran"] ?>" class="btn btn-danger btn-sm" target="_blank">Cetak PDF</a>
                  <?php else: ?>
                    <?php if(!isset($_SESSION["nisn"])) : ?>
                    <a href="tambahPembayaran.php?id=<?php echo $p["id_pembayaran"] ?>" class="btn btn-info btn-sm">Kirim Pembayaran</a>
                    <?php endif; ?>
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

    </div>

  </div>
                

<?php require 'layouts/footer.php'; ?>