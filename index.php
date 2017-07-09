<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';
$host = "localhost";
$user = "root";
$pass = "toor";	
$name = "latihan_ruangkoding";
$link = mysqli_connect($host, $user, $pass, $name);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="fonts/material/MaterialIcons.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<style>
			table {
				width: 840px;
				margin: auto;
			}
			h3 {
				text-align: center;
			}
			h5 {text-align: center; margin-bottom: 20px;}
		</style>
	</head>
	<body>
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>

		<h3>Latihan CRUD Sederhana dengan PHP 7.0</h3>
		<h5>Created by Muhammad Syariful Ali - RuangKoding</h5>
		<center><a class="waves-effect waves-light btn" href="input.php"><i class="material-icons right">add_circle</i>Input Barang</a></center>
		<br/>
		<table class="bordered highlight responsive-table">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Jenis Barang</th>
					<th>Jumlah Barang</th>
					<th>Keterangan</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query = "SELECT * FROM tabel_satu";
					$result = mysqli_query($link, $query);
					//mengecek apakah ada error ketika menjalankan query
					if(!$result){
						die ("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
					}

					$no = 1; //variabel untuk membuat nomor urut
					// hasil query akan disimpan dalam variabel $data dalam bentuk array
					// kemudian dicetak dengan perulangan while
					while($data = mysqli_fetch_assoc($result))
					{
						// mencetak / menampilkan data
						echo "<tr>";
						echo "<td>$no</td>"; //menampilkan no urut
						echo "<td>$data[kode_barang]</td>"; //menampilkan kode barang
						echo "<td>$data[nama_barang]</td>"; //menampilkan nama barang
						echo "<td>$data[jenis_barang]</td>"; //menampilkan jenis barang
						echo "<td>$data[jumlah_barang]</td>"; //menampilkan jumlah barang
						// membuat link untuk mengedit dan menghapus data
						echo '<td>
						<a class="btn-floating btn-small waves-effect waves-light red" href="edit.php?id='.$data['kode_barang'].'"><i class="material-icons">mode_edit</i></a>
						<a class="btn-floating btn-small waves-effect waves-light red" href="hapus.php?id='.$data['kode_barang'].'"
						onclick="return confirm(\'Anda yakin akan menghapus '.$data['nama_barang'].' dari database?\')"><i class="material-icons">delete</i></a>
						</td>';
						echo "</tr>";
						$no++; // menambah nilai nomor urut
					}
				?>
			</tbody>
		</table>
	</body>
</html>
