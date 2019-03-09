<?php 
require 'functions.php';
$id = $_GET["id"];

if ( hapus($id) > 0 ) {
	echo "<script>
			alert('Data Berhasil Dihapus!!!');
			document.location.href = 'anggota.php';
		</script>";
} else {
	echo "<script>
			alert('Data Gagal Ditambahkan!!!');
			document.location.href = 'index.php';
		</script>";
}
?>