<?php
//mulai proses tambah data
 
//cek dahulu, jika tombol tambah di klik
if(isset($_POST['submit'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('config/db.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$nama		= $_POST['nama'];	//membuat variabel $nis dan datanya dari inputan NIS
	$alamat		= $_POST['alamat'];	//membuat variabel $nama dan datanya dari inputan Nama Lengkap
	$deskripsi		= $_POST['deskripsi'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$latitude	= $_POST['latitude'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$longitude	= $_POST['longitude'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan

	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$input = mysql_query("INSERT INTO perpus VALUES(NULL, '$nama', '$alamat', '$deskripsi', '$latitude', '$longitude')") or die(mysql_error());
	
	//jika query input sukses
	if($input){
		
		echo 'Data berhasil di tambahkan! ';		//Pesan jika proses tambah sukses
		echo '<a href="?p=perpus/index">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		
	}else{
		
		echo 'Gagal menambahkan data! ';		//Pesan jika proses tambah gagal
		echo '<a href="?p=perpus/tambah">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		
	}
 
}else{	//jika tidak terdeteksi tombol tambah di klik
 
	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';
 
}
?>