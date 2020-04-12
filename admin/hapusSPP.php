<?php 
require '../include.php';

$id = $_GET["id"];

if (hapusSPP($id) > 0 ) {
	echo "<script>
	 alert('Data berhasil dihapus');
	 document.location.href = 'dataSPP.php';
	 </script>";
}else {
   	echo "<script>
	 alert('Data gagal dihapus');
	 document.location.href = 'dataSPP.php';
	 </script>";

}
 ?>