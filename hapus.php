<?php
// buka koneksi dengan MySQL
  include("koneksi.php");
	$host = "localhost";
  $user = "root";
  $pass = "toor";	
  $name = "latihan_ruangkoding";
  $link = mysqli_connect($host, $user, $pass, $name);

  //mengecek apakah di url ada GET id
  if (isset($_GET["id"])) {

    // menyimpan variabel id dari url ke dalam variabel $id
    $id = $_GET["id"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM tabel_satu WHERE kode_barang='$id' ";
    $hasil_query = mysqli_query($link, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($link).
           " - ".mysqli_error($link));
    }
  }
  // melakukan redirect ke halaman index.php
  header("location:index.php");
?>
