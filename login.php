<?php 
session_start();
require 'functions.php';

// cek cookie
if ( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek dan username 
    if ( $key === hash('sha256', $row['username']) ) {
        $_SESSION["login"] = true;
    }

}

if ( isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}

if ( isset($_POST["login"]) ) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if ( mysqli_num_rows($result) ) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if ( password_verify($password, $row["password"]) ) {
          // set session
          $_SESSION["login"] = true;

          // cek rememeber me
          if ( isset($_POST["remember"]) ){
            // buat cookie
            setcookie('id', $row['id'], time()+60);
            setcookie('key', hash('sha256', $row['username']), time()+60);

          }

          header("Location: index.php");
          exit;
        }

    }

    $error = true;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Login | Perpustakaan</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Favicon Perpus -->
    <link rel="shortcut icon" href="img/logo.png">
  </head>
  <body class="latar">

  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-4 offset-sm-4 latar-form rounded">
          <h2 class="text-center marginperpus"><img src="img/logo.png" width="40px">PERPUSTAKAAN</h2>
          <?php if ( isset($error) ) : ?>
              <p style="background-color: #FFAAA0; font-style: italic;">Username / Password Salah</p>
          <?php endif; ?>

          <form action="" method="post">
            <div class="form-group">
              <div class="row">
                <div class="col-sm-2 marginlog">
                  <img src="img/username.png" width="30px">
                </div>
                <div class="col-sm-10 marginkiri">
                  <input type="text" name="username" class="form-control" id="nama" placeholder="Username" autocomplete="off" autofocus required="">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-2 marginlog">
                  <img src="img/key.png" width="30px" height="32px">
                </div>
                <div class="col-sm-10 marginkiri">
                  <input type="password" name="password" class="form-control" id="nama" placeholder="Password" required="">
                </div>
              </div>
            </div>
            <div class="form-group row marginkiri2">
              <input class="form-check-input" name="remember" type="checkbox" id="gridCheck1">
              <label class="form-check-label" for="gridCheck1">
              Remember Me
              </label>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12 marginlog">
                  <button class="btn btn-primary btn-block" type="submit" name="login"><b>LOGIN</b></button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>