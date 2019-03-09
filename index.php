<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Home | Perpustakaan</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Favicon Perpus -->
    <link rel="shortcut icon" href="img/logo.png">
  </head>
  <body>
    <!-- awal navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark latar fixed-top">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" width="33" height="33" class="d-inline-block align-top" alt="">
        <b>Perpustakaan</b>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Beranda</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Anggota
            </a>
            <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="anggota.php">Data Anggota</a>
              <a class="dropdown-item" href="registrasi.php">Registrasi Anggota</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Buku
            </a>
            <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Genre Buku</a>
              <a class="dropdown-item" href="#">Jenis Buku</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Pelayanan
            </a>
            <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Peminjaman Buku</a>
              <a class="dropdown-item" href="#">Pengembalian Buku</a>
              <a class="dropdown-item" href="#">Booking Buku</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.php">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search">
          <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>    
    <!-- akhir navbar -->

    <!-- header/jumbotron -->
    <div class="jumbotron text-center marginol">
      <img src="img/logo.png">
      <div class="h2">SELAMAT DATANG DI SITUS PERPUSTAKAAN</div>
      <div class="h1">SMK NEGERI 1 KOTA BEKASI</div>
    </div>
    <!-- akhir header/jumbotron -->

    <!-- awal section -->
    <section class="latar warnadrop">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center marginatas">
            <h1><b>KOLEKSI</b></h1>
          </div>
        </div>
        <div class="row marginatas">
          <div class="col-sm-3 text-center marginbawah">
            <a href=""><img src="img/buku.svg" class="img-thumbnail rounded-circle lebar"></a>
            <h4><b>BUKU</b></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="col-sm-3 text-center marginbawah">
            <a href=""><img src="img/jurnal.svg" class="img-thumbnail rounded-circle lebar"></a>
            <h4><b>JURNAL</b></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="col-sm-3 text-center marginbawah">
            <a href=""><img src="img/karya.svg" class="img-thumbnail rounded-circle lebar"></a>
            <h4><b>KARYA SISWA</b></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="col-sm-3 text-center marginbawah">
            <a href=""><img src="img/kliping.svg" class="img-thumbnail rounded-circle lebar"></a>
            <h4><b>KLIPING</b></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
        </div>
      </div>
    </section>
    <!-- akhir section -->

    <div class="carousel slide" id="carouselExampleIndicators" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100 " src="img/suasana.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <h1>Suasana Perpustakaan</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 " src="img/suasana.jpg" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <h1>Suasana Perpustakaan</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 " src="img/suasana3.jpg" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <h1>Suasana Perpustakaan</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!-- buku terbaru -->
    <section class="bg-light">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 marginatas">
           <h1 class="text-center"><b>BUKU TERBARU</b></h1> 
          </div>
          <div class="col-sm-3">
            <div class="card marginatas marginbawah latar warnadrop">
              <a href="detail.php" class="warnadrop"><img class="card-img-top" src="img/boyman.jpg" alt="Card image cap"></a>
              <div class="card-body">
                <h5 class="card-title">BOYMAN 2</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <a href="detail.php" class="warnadrop">Lihat Detail &gt;&gt;</a>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card marginatas marginbawah latar warnadrop">
              <a href="detail.php" class="warnadrop"><img class="card-img-top" src="img/boyman.jpg" alt="Card image cap"></a>
              <div class="card-body">
                <h5 class="card-title">LAMUNAN SENJA</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <a href="detail.php" class="warnadrop">Lihat Detail &gt;&gt;</a>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card marginatas marginbawah latar warnadrop">
              <a href="detail.php" class="warnadrop"><img class="card-img-top" src="img/boyman.jpg" alt="Card image cap"></a>
              <div class="card-body">
                <h5 class="card-title">UBUR-UBUR LEMBUR</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <a href="detail.php" class="warnadrop">Lihat Detail &gt;&gt;</a>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card marginatas marginbawah latar warnadrop">
              <a href="detail.php" class="warnadrop"><img class="card-img-top" src="img/boyman.jpg" alt="Card image cap"></a>
              <div class="card-body">
                <h5 class="card-title">LAMUNAN SENJA</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <a href="detail.php" class="warnadrop">Lihat Detail &gt;&gt;</a>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- akhir buku terbaru -->
    
    <!-- footer atas -->
    <section class="bg-dark">
      <div class="container">
        <div class="row warnadrop">
          <div class="col-sm-4 text-left">
            <h3 class="warnadrop marginatas"><b>RELATED LINKS</b></h3>
              <div><a href="">Lorem ipsum dolor sit amet, consectetur</a></div>
              <div><a href="">Lorem ipsum dolor sit</a></div>
              <div><a href="">Lorem ipsum dolor sit amet, </a></div>
              <div><a href="">Lorem ipsum dolor sit amet, consectetur</a></div>
              <div><a href="">Lorem ipsum dolor </a></div>
          </div>
          <div class="col-sm-4 text-center">
            <h3 class="warnadrop marginatas"><b>FIND ME ON</b></h3>
            <a href=""><img src="img/email.png" class="marginatas rounded-circle lebaremail"></a>
            <a href=""><img src="img/lokasi.png" class="marginatas rounded-circle lebaremail"></a>
            <a href=""><img src="img/telpon.png" class="marginatas rounded-circle lebaremail"></a>
          </div>
          <div class="col-sm-4 text-right">
            <h3 class="warnadrop marginatas"><b>KONTAK KITA</b></h3>
            <div>Perpustakaan Sekolah</div>
            <div>SMK NEGERI 1 KOTA BEKASI</div>
            <div>Jln. Bintara VIII</div>
            <div>Bintara Jaya, Kota Bekasi</div>
            <div>021 44233857</div>
            <div>www.smkn1kotabekasi.co.id</div>
          </div>
        </div>
      </div>
    </section>
    <!-- akhir footer atas -->

    <!-- copyright -->
    <footer class="latarfoot warnadrop">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <p class="text-center marginatas">&copy; Copyright 2018 | Designed By <a href="http://instagram.com/abutoyibaz">Abu T.A</a></p>
          </div>
        </div>
      </div>
    </footer>
    <!-- akhir copyright -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>