<?php
/*
  
  $link = mysqli_connect($host,$user,$pass,$name);
  //periksa koneksi, tampilkan pesan kesalahan jika gagal
  if(!$link){
    die ("Koneksi dengan database gagal: ".mysql_connect_errno().
    " - ".mysql_connect_error());

INSERT INTO `tabel_satu` (`kode_barang`, `nama_barang`, `jumlah_barang`)
  VALUES (1, 'Komputer', 12),(2, 'Laptop', 15);
  }*/
// buat koneksi dengan database mysql
  $host = "localhost";
  $user = "root";
  $pass = "toor";
  $name = "latihan_ruangkoding";
  $link = mysqli_connect($host, $user, $pass, $name);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

mysqli_close($link);
?>
