<?php
// memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';
$host = "localhost";
$user = "root";
$pass = "toor";	
$name = "latihan_ruangkoding";
$link = mysqli_connect($host, $user, $pass, $name);

// mengecek apakah di url ada nilai GET id
if (isset($_GET['id'])) {
// ambil nilai id dari url dan disimpan dalam variabel $id
$id = ($_GET["id"]);

// menampilkan data tabel_satu dari database yang mempunyai id=$id
$query = "SELECT * FROM tabel_satu WHERE kode_barang='$id'";
$result = mysqli_query($link, $query);
// mengecek apakah query gagal
if(!$result){
die ("Query Error: ".mysqli_errno($link).
" - ".mysqli_error($link));
}
// mengambil data dari database dan membuat variabel" utk menampung data
// variabel ini nantinya akan ditampilkan pada form
$data = mysqli_fetch_assoc($result);
$kode_barang = $data["kode_barang"];
$nama_barang = $data["nama_barang"];
$jenis_barang = $data["jenis_barang"];
$jumlah_barang = $data["jumlah_barang"];

} else {
// apabila tidak ada data GET id pada akan di redirect ke index.php
header("location:index.php");
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="fonts/material/MaterialIcons.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<style>
			h3{
				text-align: center;
			}
			h5{
				text-align: center;
				margin-bottom: 20px;
			}
			.container{
				width: 400px;
				margin: auto;
			}
		</style>
	</head>
	<body>
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

		<h3>Edit Data</h3>
		<h5>Created by Muhammad Syariful Ali - RuangKoding</h5>

		<div class="row" style="width: 600px">
			<form class="col s12 responsive" action="edit_proses.php" method="post">
				<input type="hidden" name="id" value="<?php echo $kode_barang; ?>">
				<div class="row">
					<div class="input-field col s12">
						<input type="text" name="kode_barang" id="kode_barang" value="<?php echo $kode_barang ?>" readonly>
						<label for="kode_barang">Kode Barang</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="text" name="nama_barang" id="nama_barang" value="<?php echo $nama_barang ?>">
						<label for="nama_barang">Nama Barang</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<select name="jenis_barang" id="jenis_barang">
							<option value="Elektronik" <?php if($data['jenis_barang'] == 'Elektronik'){ echo 'selected'; } ?>>
							Elektronik </option>
							<option value="Harian" <?php if($data['jenis_barang'] == 'Harian'){ echo 'selected'; } ?>>
							Harian</option>
							<option value="Cair" <?php if($data['jenis_barang'] == 'Cair'){ echo 'selected'; } ?>>
							Cair</option>
							<option value="Padat" <?php if($data['jenis_barang'] == 'Padat'){ echo 'selected'; } ?>>
							Padat</option>
							<option value="Gas" <?php if($data['jenis_barang'] == 'Gas'){ echo 'selected'; } ?>>
							Gas</option>
						</select>
						<label>Jenis Barang</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="text" name="jumlah_barang" id="jumlah_barang" value="<?php echo $jumlah_barang ?>">
						<label for="jumlah_barang">Jumlah Barang</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<button class="btn waves-effect waves-light" type="submit" name="edit">Update Data
							<i class="material-icons right">cached</i>
						</button>
					</div>
				</div>
			</form>
		</div>

		<script type="text/javascript">
			$(document).ready(function() {
				$('select').material_select();
			});
		</script>
	</body>
</html>
