<?php 
require '../include.php';
require 'layouts/header.php'; 
$id = $_GET["id"];
$spp = query("SELECT * FROM spp WHERE id_spp = '$id'")[0];
if (isset($_POST["submit"])) {
  if (updateSPP($_POST) > 0) {
        echo "<script>
        alert('Data berhasil diupdate');
        document.location.href= 'dataSPP.php';
        </script>"; 
  }else{
     echo "<script>
        alert('Data gagal diupdate');
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
          <h5>Form Update SPP</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal">
            <input type="hidden" name="id_spp" value="<?php echo $spp["id_spp"]; ?>">
            <div class="control-group">
              <label class="control-label">Tahun :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First tahun" name="tahun" value="<?php echo $spp["tahun"] ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nominal</label>
              <div class="controls">
                <input type="number" class="span11" placeholder="First nominal" name="nominal" value="<?php echo $spp["nominal"]; ?>" />
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