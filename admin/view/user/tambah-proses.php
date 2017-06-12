<?php
//mulai proses tambah data
 
//cek dahulu, jika tombol tambah di klik
if(isset($_POST['submit'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('config/db.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$nama		= $_POST['nama_petugas'];	//membuat variabel $nis dan datanya dari inputan NIS
	$alamat		= $_POST['alamat'];	//membuat variabel $nama dan datanya dari inputan Nama Lengkap
	$tempat		= $_POST['tempat'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$tangal	= $_POST['tangal'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$username	= $_POST['username'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$password	= $_POST['password'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$date = date("Y-m-d");
	
	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$input = mysql_query("INSERT INTO petugas VALUES(NULL, '$nama', '$alamat', '$date', '$tempat', '$tangal', '$username', '$password', '2')") or die(mysql_error());
	
	//jika query input sukses
	if($input){
		
		echo 'Data berhasil di tambahkan! ';		//Pesan jika proses tambah sukses
		echo '<a href="?p=user/index">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		
	}else{
		
		echo 'Gagal menambahkan data! ';		//Pesan jika proses tambah gagal
		echo '<a href="?p=user/tambah.php">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		
	}
 
}else{	//jika tidak terdeteksi tombol tambah di klik
 
	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';
 
}
?>