<?php
session_start();
require 'include.php';
if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username'");

  // cek username
  if (mysqli_num_rows($result) === 1) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {

      // set session
      $_SESSION["petugas"] = true;
      $_SESSION["petugas"] = $row;

      if($row["level"] == "admin"){
       echo "<script>
        alert('Login Sukses');
        document.location.href= 'admin/index.php';
        </script>";         
      }elseif($row["level"] == "petugas") {
              echo "<script>
        alert('Login Sukses');
        document.location.href= 'admin/index.php';
        </script>";        
      }

    }
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
                <label>Username</label>
                <input type="text" name="username" class="form-control">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
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