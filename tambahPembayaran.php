<?php 
session_start();
require '../functions.php';
require 'layouts/header.php'; 
$petugas = query("SELECT * FROM tb_petugas WHERE level = 'petugas'");
$id_pembayaran = $_GET["id"];
$pembayaran = query("SELECT * FROM tb_pembayaran WHERE id_pembayaran = '$id_pembayaran'")[0];
$nisn = $pembayaran["nisn"];
$siswa = query("SELECT * FROM tb_siswa WHERE nisn = '$nisn'")[0];
$id_spp = $siswa["id_spp"];
$spp = query("SELECT * FROM tb_spp WHERE id_spp = '$id_spp'")[0];

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

<div class="main-content">
<?php require 'layouts/navbar.php' ?>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
       	<div class="row">
       		<div class="col-md-12">
       			<h1 class="text-white">Halaman Tambah Pembayaran</h1>
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
              <h3 class="mb-0">Form Tambah Pembayaran</h3>
            </div>
          	<div class="card-body">
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