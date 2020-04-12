<?php 
require '../include.php';
require 'layouts/header.php'; 
$kelas = query("SELECT * FROM kelas");
$spp = query("SELECT * FROM spp");
$id = $_GET["id"];
$siswa = query("SELECT * FROM siswa WHERE id_siswa = '$id'")[0];
$status = ["lunas","belum-lunas"];
if (isset($_POST["submit"])) {
	if (updateSiswa($_POST) > 0) {
		echo "<script>
        alert('Data berhasil diupdate');
        document.location.href= 'dataUser.php';
        </script>"; 
	}else{
		 echo "<script>
        alert('Data gagal diupdate');
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
          <h5>Form Update Siswa</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" autocomplete="off">
          	<input type="hidden" name="siswa" value="<?php echo $siswa["id_siswa"]; ?>">
            <div class="control-group">
              <label class="control-label">NISN :</label>
              <div class="controls">
                <input type="text" name="nisn" class="span11" maxlength="8" placeholder="First NISN" value="<?php echo $siswa["nisn"]; ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">NIS</label>
              <div class="controls">
                <input type="text" name="nis" class="span11" placeholder="Enter NIS" maxlength="4" value="<?php echo $siswa["nis"]; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nama :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First Nama" name="nama" value="<?php echo $siswa["nama"]; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Kelas :</label>
              <div class="controls">
				<select name="kelas" class="span11">
					<option>Pilih Kelas</option>
					<?php foreach($kelas as $k) : ?>
						<?php if($k["id_kelas"] === $siswa["id_kelas"]) : ?>
							<option value="<?php echo $k["id_kelas"] ?>" selected><?php echo $k["nama_kelas"] ?> - <?php echo $k["kompetensi_keahlian"] ?></option>
						<?php else: ?>
							<option value="<?php echo $k["id_kelas"] ?>"><?php echo $k["nama_kelas"] ?> - <?php echo $k["kompetensi_keahlian"] ?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Alamat</label>
              <div class="controls">
                <input type="text" name="alamat" class="span11" placeholder="Enter alamat" value="<?php echo $siswa["alamat"]; ?>" />
              </div>
            </div>
                        <div class="control-group">
              <label class="control-label">Telp</label>
              <div class="controls">
                <input type="text" name="no_telp" value="<?php echo $siswa["no_telp"]; ?>" class="span11" placeholder="Enter no_telp" maxlength="13" />
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">SPP :</label>
              <div class="controls">
				<select name="spp" class="span11">
						<option>Pilih SPP</option>
						<?php foreach($spp as $p) : ?>
							<?php if($p["id_spp"] === $siswa["id_spp"]) : ?>
								<option value="<?php echo $p["id_spp"] ?>" selected><?php echo $p["tahun"] ?> - <?php echo number_format($p["nominal"],0,',','.'); ?></option>
							<?php else: ?>
			<option value="<?php echo $p["id_spp"] ?>"><?php echo $p["tahun"] ?> - <?php echo number_format($p["nominal"],0,',','.'); ?></option>
							<?php endif; ?>
						<?php endforeach; ?>
				</select>
              </div>
            </div>
            <div class="control-group">
            	<label class="control-label">Status</label>
            	<div class="controls">
            		<select name="status" class="span11">
            			<option>Pilih Status</option>
            			<?php foreach($status as $s) : ?>
            				<?php if($s === $siswa["status"]) : ?>
<option value="<?php echo $s ?>" selected><?php echo $s ?></option>
            				<?php else: ?>
<option value="<?php echo $s ?>"><?php echo $s ?></option>
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

<!-- <div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 mt-5">
			<div class="container">
				<div class="card">
					<div class="card-header bg-primary text-center text-white">
						Update Data Siswa
					</div>
					<div class="card-body">
						<form method="post" action="" autocomplete="off">
							<input type="hidden" name="id_siswa" value="<?php echo $siswa["id_siswa"]; ?>">
							<div class="form-group">
								<label>NISN</label>
								<input type="text" name="nisn" class="form-control" value="<?php echo $siswa["nisn"]; ?>" maxlength="8">
							</div>
							<div class="form-group">
								<label>NIS</label>
								<input type="text" name="nis" class="form-control" maxlength="6" value="<?php echo $siswa["nis"]; ?>">
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="nama" class="form-control" value="<?php echo $siswa["nama"]; ?>">
							</div>
							<div class="form-group">
								<label>Kelas</label>
								<select name="id_kelas" class="custom-select">
									<option>Pilih Kelas</option>
									<?php foreach($kelas as $k) : ?>
										<?php if($k["id_kelas"] === $siswa["id_kelas"]) : ?>
											<option value="<?php echo $k["id_kelas"] ?>" selected><?php echo $k["nama_kelas"] ?> - <?php echo $k["kompetensi_keahlian"] ?></option>
										<?php else: ?>
											<option value="<?php echo $k["id_kelas"] ?>"><?php echo $k["nama_kelas"] ?> - <?php echo $k["kompetensi_keahlian"] ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<input type="text" name="alamat" class="form-control" value="<?php echo $siswa["alamat"]; ?>">
							</div>
							<div class="form-group">
								<label>No.Telp</label>
								<input type="text" name="no_telp" class="form-control" maxlength="13" value="<?php echo $siswa["no_telp"]; ?>">
							</div>
							<div class="form-group">
								<label>SPP</label>
								<select name="id_spp" class="custom-select">
									<option>Pilih SPP</option>
									<?php foreach($spp as $p) : ?>
										<?php if($p["id_spp"] === $siswa["id_spp"]) : ?>
											<option value="<?php echo $p["id_spp"] ?>" selected><?php echo $p["tahun"] ?> - <?php echo number_format($p["nominal"],0,',','.'); ?></option>
										<?php else: ?>
		<option value="<?php echo $p["id_spp"] ?>"><?php echo $p["tahun"] ?> - <?php echo number_format($p["nominal"],0,',','.'); ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
							<button type="submit" name="submit" class="btn btn-primary btn-sm btn-block">Update Data</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->