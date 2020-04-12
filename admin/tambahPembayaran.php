<?php 
require '../include.php';
require 'layouts/header.php'; 
$petugas = query("SELECT * FROM petugas WHERE level = 'petugas'");
$id_pembayaran = $_GET["id"];
$pembayaran = query("SELECT * FROM pembayaran WHERE id_pembayaran = '$id_pembayaran'")[0];
$nisn = $pembayaran["nisn"];
$siswa = query("SELECT * FROM siswa WHERE nisn = '$nisn'")[0];
$id_spp = $siswa["id_spp"];
$spp = query("SELECT * FROM spp WHERE id_spp = '$id_spp'")[0];

if (isset($_POST["submit"])) {
  if (kirimPembayaran($_POST) > 0) {
           echo "<script>
        alert('Data berhasil dibayar');
        document.location.href= 'dataPembayaran.php';
        </script>"; 
  }else{
     echo "<script>
        alert('Data gagal dibayar');
        document.location.href= 'dataPembayaran.php';
        </script>"; 
  }
}  

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
          <form method="post" action="" autocomplete="off">
              <input type="hidden" name="id_pembayaran" value="<?php echo $id_pembayaran; ?>">
              <input type="hidden" name="nisn" value="<?php echo $siswa["nisn"]; ?>">
              <input type="hidden" name="id_spp" value="<?php echo $siswa["id_spp"]; ?>">
              <div class="form-group">
                <label>Petugas</label>
                <select class="custom-select" name="id_petugas">
                <option>Pilih Petugas</option>
                <?php foreach($petugas as $p) : ?>
                  <option value="<?php echo $p["id_petugas"] ?>"><?php echo $p["nama_petugas"]; ?></option>
                <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Total Pembayaran</label>
                <input type="text" name="jumlah_bayar" class="form-control" value="<?php echo $spp["nominal"]; ?>" readonly>
              </div>
              <button type="submit" name="submit" class="btn btn-primary  btn-block">Kirim Pembayaran</button>
            </form>
          </div>
        </div>
  		</div>
  	</div>
  </div>
</div>


<?php require 'layouts/footer.php'; ?>