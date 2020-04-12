<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Pembayaran SPP Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Pembayaran SPP Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <?php if(isset($_SESSION["petugas"]["level"])) : ?>
    <li class=""><a title="" href="#"><i class="icon icon-user"></i> <span class="text">Welcome <?php echo $_SESSION["petugas"]["nama_petugas"]; ?></span></a></li>
    <?php else: ?>
       <li class=""><a title="" href="#"><i class="icon icon-user"></i> <span class="text">Welcome <?php echo $_SESSION["petugas"]["nama"]; ?></span></a></li>
    <?php endif; ?>
    <li class=""><a title="" href="../logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--sidebar-menu-->
<div id="sidebar"><a href="index.php" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li><a href="index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <?php if(isset($_SESSION["petugas"]["level"])) : ?>
      <?php if($_SESSION["petugas"]["level"] === "admin") : ?>
            <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Data User</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="dataPetugas.php">Data Petugas</a></li>
        <li><a href="dataUser.php">Data Siswa</a></li>
      </ul>
    </li>
    <li><a href="dataKelas.php"><i class="icon icon-home"></i> <span>Kelas</span></a> </li>
    <li><a href="dataSPP.php"><i class="icon icon-home"></i> <span>SPP</span></a> </li>
      <?php endif; ?>
  <?php endif; ?>
    <li><a href="dataPembayaran.php"><i class="icon icon-home"></i> <span>Pembayaran</span></a> </li>
  </ul>
</div>
<!--sidebar-menu-->