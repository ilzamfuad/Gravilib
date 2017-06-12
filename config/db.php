<?php
$host = "localhost";
$user = "root";
$pass = "cumlaude2018";
$name = "perpustakaan";
 
$connection = mysql_connect($host, $user, $pass) or die("Koneksi ke database gagal!");
mysql_select_db($name, $connection) or die("Tidak ada database yang dipilih!");
?>