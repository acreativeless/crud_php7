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
			h5 {
				text-align: center;
				margin-bottom: 20px;
			}
		</style>
	</head>
	<body>
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

		<h3>Latihan CRUD Sederhana dengan PHP 7.0</h3>
		<h5>Created by Muhammad Syariful Ali - RuangKoding</h5>
		<div class="row" style="width: 600px">
			<form class="col s12 responsive" action="input_proses.php" method="post">
				<div class="row">
					<div class="input-field col s12">
						<input id="kode_barang" name="kode_barang" type="text" class="validate" data-length="5">
						<label for="kode_barang">Kode Barang</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="nama_barang" name="nama_barang" type="text" class="validate">
						<label for="nama_barang">Nama Barang</label>
					</div>
				</div>
				<!--
				<div class="row">
					<div class="input-field col s12">
						<input disabled value="I am not editable" id="disabled" type="text" class="validate">
						<label for="disabled">Disabled</label>
					</div>
				</div>-->
				<div class="row">
					<div class="input-field col s12">
						<select name="jenis_barang">
							<option value="" disabled selected>Pilih Jenis Barang</option>
							<option value="Elektronik">Elektronik</option>
							<option value="Harian">Harian</option>
							<option value="Cair">Cair</option>
							<option value="Padat">Padat</option>
							<option value="Gas">Gas</option>
						</select>
						<label>Jenis Barang</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="jumlah_barang" name="jumlah_barang" type="text" class="validate">
						<label for="jumlah_barang">Jumlah Barang</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<button class="btn waves-effect waves-light" type="submit" name="submit">Submit
							<i class="material-icons right">send</i>
						</button>
					</div>
				</div>
			</form>
		</div>

		<script type="text/javascript">
			$(document).ready(function() {
				$('select').material_select();
				$('input#kode_barang').characterCounter();
			});
		</script>
	</body>
</html>
