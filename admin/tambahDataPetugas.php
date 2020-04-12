<?php 
require '../include.php';
require 'layouts/header.php'; 

if (isset($_POST["submit"])) {
	if (tambahPetugas($_POST) > 0) {
		 echo "<script>
        alert('Data berhasil ditambahkan');
        document.location.href= 'dataPetugas.php';
        </script>"; 
	}else{
		 echo "<script>
        alert('Data gagal ditambahkan');
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
          <h5>Form Tambah Petugas</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Username :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First username" name="username" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password</label>
              <div class="controls">
                <input type="password" name="password" class="span11" placeholder="Enter Password"  />
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Nama Petugas :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First nama_petugas" name="nama_petugas" />
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

<?php require 'layouts/footer.php'; ?>