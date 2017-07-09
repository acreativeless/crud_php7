<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {
  // buat koneksi dengan database
  include("koneksi.php");
  $host = "localhost";
  $user = "root";
  $pass = "toor";	
  $name = "latihan_ruangkoding";
  $link = mysqli_connect($host, $user, $pass, $name);

  // membuat variabel untuk menampung data dari form edit
  $kode = $_POST['kode_barang'];
	$nama	= $_POST['nama_barang'];
	$jenis	= $_POST['jenis_barang'];
	$jumlah = $_POST['jumlah_barang'];

  //buat dan jalankan query UPDATE
  $query  = "UPDATE tabel_satu SET ";
  $query .= "nama_barang = '$nama', ";
  $query .= "jumlah_barang='$jumlah', ";
  $query .= "jenis_barang = '$jenis'";
  $query .= "WHERE kode_barang = '$kode'";

  $result = mysqli_query($link, $query);

  //periksa hasil query apakah ada error
  if(!$result) {
    die ("Query gagal dijalankan: ".mysqli_errno($link).
       " - ".mysqli_error($link));
  }
}

//lakukan redirect ke halaman index.php
header("location:index.php");


?>
