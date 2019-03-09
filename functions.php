<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "perpustakaan");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ){
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data) {
  global $conn;

  $nama = htmlspecialchars($data["nama"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
  $no_telp = htmlspecialchars($data["no_telp"]);

  //upload gambar
  $foto = upload();
  if ( !$foto ) {
  	return false;
  }

  $query = "INSERT INTO anggota VALUES ('', '$nama', '$alamat', '$tanggal_lahir', '$no_telp', '$foto') ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function upload() {
	$namaFile = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];

	// cek apakah gambar tidak ada yang di upload
	if ( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu');
			</script>
			";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar');
			</script>
			";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if ( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar');
			</script>
			";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, $namaFileBaru);

	return $namaFileBaru;
}


function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM anggota WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function edit($data) {
  global $conn;

  $id = $data["id"];
  $nama = htmlspecialchars($data["nama"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
  $no_telp = htmlspecialchars($data["no_telp"]);
  $fotoLama = htmlspecialchars($data["gambarLama"]);

  //cek apakah user pilih gambar baru
  if ( $_FILES['foto']['error'] === 4 ) {
  	$foto = $fotoLama;
  } else {
  	$foto = upload();
  }

  $query = "UPDATE anggota SET 
  			nama = '$nama',
  			alamat = '$alamat',
  			tanggal_lahir = '$tanggal_lahir',
  			no_telp = '$no_telp',
  			foto = '$foto'
  			WHERE id = $id
  			";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function cari($keyword) {
	$query = "SELECT * FROM anggota
				WHERE
			nama LIKE '%$keyword%' OR 
			alamat LIKE '%$keyword%' OR
			tanggal_lahir LIKE '%$keyword%' OR
			no_telp LIKE '%$keyword%'
			";
	return query($query);
}

function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$konfirmasi = mysqli_real_escape_string($conn, $data["konfirmasi"]);

	//cek username sudah ada belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if ( mysqli_fetch_assoc($result) ) {
		echo "<script>
               alert('Username Sudah Ada');
              </script>";;
        return false;
	}

	//cek konfirmasi password
	if ( $password !== $konfirmasi ) {
		echo "<script>
               alert('konfirmasi Password Tidak Sesuai');
              </script>";
        return false;
	} 

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

	mysqli_affected_rows($conn);

	return 1;
}






?>
