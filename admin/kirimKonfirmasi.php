<?php 
session_start();
require '../include.php';
$id_siswa = $_GET["id"];
$id_petugas = $_GET["id_petugas"];

$siswa = query("SELECT * FROM siswa WHERE id_siswa = '$id_siswa'")[0];
$id_spp = $siswa["id_spp"];
$nisn = $siswa["nisn"];
$tgl_bayar = date("Y-m-d");
$bulan_dibayar = date("m");
$tahun_dibayar = date("Y");
$spp = query("SELECT * FROM spp WHERE id_spp = '$id_spp'")[0];
$jumlah_bayar = $spp["nominal"];

mysqli_query($conn,"UPDATE siswa SET status = 'lunas' WHERE id_siswa = '$id_siswa'");
mysqli_query($conn,"INSERT INTO pembayaran VALUES ('','$id_petugas','$nisn','$tgl_bayar','$bulan_dibayar','$tahun_dibayar','$id_spp','$jumlah_bayar')");

	echo "<script>
	 alert('Data berhasil dikonfirmasi');
	 document.location.href = 'dataUser.php';
	 </script>";