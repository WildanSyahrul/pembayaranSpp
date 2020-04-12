<?php 
require '../include.php';
require 'layouts/header.php'; 
$id = $_GET["id"];
$jurusan = ["RPL","TB"];
$kelas = query("SELECT * FROM kelas WHERE id_kelas = '$id'")[0];
if (isset($_POST["submit"])) {
	if (updateKelas($_POST) > 0) {
		       echo "<script>
        alert('Data berhasil diupdate');
        document.location.href= 'dataKelas.php';
        </script>"; 
	}else{
		 echo "<script>
        alert('Data gagal diupdate');
        document.location.href= 'dataKelas.php';
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
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Form Update Kelas</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal">
          	<input type="hidden" name="id_kelas" value="<?php echo $kelas["id_kelas"]; ?>">
            <div class="control-group">
              <label class="control-label">Nama Kelas :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First nama_kelas" name="nama_kelas"  value="<?php echo $kelas["nama_kelas"]; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Kompetensi Keahlian</label>
              <div class="controls">
				<select class="span11" name="kompetensi_keahlian">
								<option>Pilih Jurusan</option>
								<?php foreach($jurusan as $j) : ?>
									<?php if($kelas["kompetensi_keahlian"] === $j) : ?>
									<option value="<?php echo $j; ?>" selected><?php echo $j; ?></option>
									<?php else: ?>
									<option value="<?php echo $j; ?>"><?php echo $j; ?></option>	
									<?php endif; ?>
								<?php endforeach; ?>
				</select>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success" name="submit">Update</button>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>
</div>
</div>
</div>

<?php require 'layouts/footer.php'; ?>

