<?php require 'layouts/header.php'; ?>

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->
  <hr/>
  <?php if(isset($_SESSION["petugas"]["level"])) : ?>
<h1 class="text-center">Selamat Datang <?php echo $_SESSION["petugas"]["level"]; ?></h1>  
  <?php else: ?>
<h1 class="text-center">Selamat Datang Siswa</h1>  
  <?php endif; ?>

</div>


<!--end-main-container-part-->
<?php require 'layouts/footer.php'; ?>

