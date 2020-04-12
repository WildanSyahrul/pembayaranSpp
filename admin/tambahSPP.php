<?php 
require '../include.php';
require 'layouts/header.php'; 
if (isset($_POST["submit"])) {
	if (tambahSPP($_POST) > 0) {
		       echo "<script>
        alert('Data berhasil ditambahkan');
        document.location.href= 'dataSPP.php';
        </script>"; 
	}else{
		 echo "<script>
        alert('Data gagal ditambahkan');
        document.location.href= 'dataSPP.php';
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
          <h5>Form Tambah SPP</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Tahun :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First tahun" name="tahun" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nominal</label>
              <div class="controls">
              	<input type="number" class="span11" placeholder="First nominal" name="nominal" />
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
