<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// pagination
// konfigurasi
$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM anggota"));
$jumlahHalaman = $jumlahData / $jumlahDataPerHalaman;
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$anggota = query("SELECT * FROM anggota LIMIT $awalData, $jumlahDataPerHalaman");

// tombol cari ditekan
if ( isset($_POST["cari"]) ) {
  $anggota = cari($_POST["keyword"]);

}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Anggota | Perpustakaan</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

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
            <a class="nav-link" href="index.php">Beranda</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Anggota
            </a>
            <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Data Anggota</a>
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

    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 table-responsive">
            <h1 class=" text-center marginatas2"><b>Data Anggota Perpustakaan</b></h1>
            <form class="row marginatas" action="" method="post">
              <div class="col-sm-10">
                <input type="text" name="keyword" class="form-control" placeholder="Cari Keyword Anggota" required autofocus autocomplete="off" id="keyword">
              </div>
              <div class="col-sm-2">
                <button type="submit" name="cari" class="btn-primary btn-block" id="tombol-cari"><h5>Cari</h5></button>
              </div>
            </form>
            <div id="pembungkus">
              <table class="table table-striped margintabel table-hover">
                <thead class="latar warnadrop">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">No Telp</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                  <?php foreach( $anggota as $row ) : ?>
                  <tr>
                    <th scope="row" class="align-middle"><?= $i; ?></th>
                    <td class="align-middle"><?= $row["nama"] ?></td>
                    <td class="align-middle"><?= $row["alamat"] ?></td>
                    <td class="align-middle"><?= $row["tanggal_lahir"] ?></td>
                    <td class="align-middle"><?= $row["no_telp"] ?></td>
                    <td class="align-middle"><img src="<?= $row["foto"] ?>" width="50"></td>
                    <td class="align-middle">
                        <button type="button" class="btn btn-outline-primary btn-sm"><a href="ubah.php?id=<?= $row["id"] ?>">Edit</a></button>
                        <button type="button" class="btn btn-outline-primary btn-sm"><a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('Yakin Nih Mau Dihapus ?')">Hapus</a></button>
                    </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <nav aria-label="navigation pagination-lg">
                  <ul class="pagination justify-content-end">
                    <?php if( $halamanAktif > 1 ) : ?>
                      <li class="page-item">
                        <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>">Previous</a>
                      </li>
                    <?php endif; ?>
                    <?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
                      <?php if( $i == $halamanAktif ) : ?>
                        <li class="page-item active"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                      <?php else : ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                      <?php endif; ?>
                    <?php endfor; ?>
                    <?php if( $halamanAktif < $jumlahHalaman ) : ?>
                      <li class="page-item">
                        <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>">Next</a>
                      </li>
                    <?php endif; ?>
                  </ul>
                </nav>
              </div>
            </div>    
          </div>
        </div>
      </div>
    </section>

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
    
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>