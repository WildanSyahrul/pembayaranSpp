<?php 
require '../include.php';

$id = $_GET["id"];

if (hapusPetugas($id) > 0 ) {
	echo "<script>
	 alert('Data berhasil dihapus');
	 document.location.href = 'dataPetugas.php';
	 </script>";
}else {
   	echo "<script>
	 alert('Data gagal dihapus');
	 document.location.href = 'dataPetugas.php';
	 </script>";

}
 ?>