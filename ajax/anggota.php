<?php  

require '../functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM anggota
				WHERE
			nama LIKE '%$keyword%' OR 
			alamat LIKE '%$keyword%' OR
			tanggal_lahir LIKE '%$keyword%' OR
			no_telp LIKE '%$keyword%'
			";
$anggota = query($query);

?>

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