<?php 
require '../include.php';
require 'layouts/header.php'; 
$kelas = query("SELECT * FROM kelas");
$spp = query("SELECT * FROM spp");
if (isset($_POST["submit"])) {
	if (tambahSiswa($_POST) > 0) {
		echo "<script>
        alert('Data berhasil ditambahkan');
        document.location.href= 'dataUser.php';
        </script>"; 
	}else{

		 echo "<script>
        alert('Data gagal ditambahkan');
        document.location.href= 'dataUser.php';
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
          <h5>Form Tambah Siswa</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" autocomplete="off">
            <div class="control-group">
              <label class="control-label">NISN :</label>
              <div class="controls">
                <input type="text" name="nisn" class="span11" maxlength="8" placeholder="First NISN">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">NIS</label>
              <div class="controls">
                <input type="text" name="nis" class="span11" placeholder="Enter NIS" maxlength="4" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nama :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First Nama" name="nama" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Kelas :</label>
              <div class="controls">
				<select name="kelas" class="span11">
					<option>Pilih Kelas</option>
					<?php foreach($kelas as $k) : ?>
						<option value="<?php echo $k["id_kelas"] ?>"><?php echo $k["nama_kelas"] ?> - <?php echo $k["kompetensi_keahlian"] ?></option>
					<?php endforeach; ?>
				</select>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Alamat</label>
              <div class="controls">
                <input type="text" name="alamat" class="span11" placeholder="Enter alamat"  />
              </div>
            </div>
                        <div class="control-group">
              <label class="control-label">Telp</label>
              <div class="controls">
                <input type="text" name="no_telp" class="span11" placeholder="Enter no_telp" maxlength="13" />
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">SPP :</label>
              <div class="controls">
				<select name="spp" class="span11">
					<option>Pilih SPP</option>
					<?php foreach($spp as $p) : ?>
						<option value="<?php echo $p["id_spp"] ?>"><?php echo $p["tahun"] ?> - <?php echo number_format($p["nominal"],0,',','.'); ?></option>
					<?php endforeach; ?>
				</select>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success" name="submit">Tambah</button>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>
</div>
</div>
</div>