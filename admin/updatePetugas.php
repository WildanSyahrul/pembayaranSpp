<?php 
require '../include.php';
require 'layouts/header.php'; 
$id = $_GET["id"];
$petugas = query("SELECT * FROM petugas WHERE id_petugas = '$id'")[0];
if (isset($_POST["submit"])) {
	if (updatePetugas($_POST) > 0) {
		       echo "<script>
        alert('Data berhasil diupdate');
        document.location.href= 'dataPetugas.php';
        </script>"; 
	}else{
		 echo "<script>
        alert('Data gagal diupdate');
        document.location.href= 'dataPetugas.php';
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
          <h5>Form Update Petugas</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal">
          	<input type="hidden" name="id_petugas" value="<?php echo $petugas["id_petugas"]; ?>">
            <div class="control-group">
              <label class="control-label">Username :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First username" name="username" value="<?php echo $petugas["username"]; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password</label>
              <div class="controls">
                <input type="password" name="password" class="span11" placeholder="Enter Password" value="<?php echo $petugas["password"]; ?>" />
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Nama Petugas :</label>
              <div class="controls">
                <input type="text" class="span11" value="<?php echo $petugas["nama_petugas"]; ?>" placeholder="First nama_petugas" name="nama_petugas" />
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