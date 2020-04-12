<?php
session_start();
require 'include.php';
if (isset($_POST["login"])) {

  $nama = $_POST["nama"];
  $nisn = $_POST["nisn"];

  $result = mysqli_query($conn, "SELECT * FROM siswa WHERE nama = '$nama' AND nisn = '$nisn'");

  // cek nama
  if (mysqli_num_rows($result) === 1) {

    // cek nisn
    $row = mysqli_fetch_assoc($result);

      // set session
      $_SESSION["petugas"] = true;
      $_SESSION["petugas"] = $row;
      $_SESSION["nisn"] = true;

       echo "<script>
        alert('Login Sukses');
        document.location.href= 'admin/index.php';
        </script>";         

  }

  $error = true;
}

?>

<html> 
<head>
  <title>Halaman LOGIN</title> 
  <!-- Memanggil Bootstrap -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
</head>
<body>
 
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 mt-5">
      <div class="container shadow p-3 mb-5 bg-white rounded">
        <div class="card">
          <div class="card-header bg-primary text-center text-white">
            HALAMAN LOGIN
          </div>
          <div class="card-body">
            <form method="post" action="" autocomplete="off">
              <div class="form-group">
                <label>nama</label>
                <input type="text" name="nama" class="form-control">
              </div>
              <div class="form-group">
                <label>nisn</label>
                <input type="text" name="nisn" class="form-control">
              </div>
              <div class="text-center"><button type="submit" name="login" class="btn btn-primary btn-sm">Login</button></div>  
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>