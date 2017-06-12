<?php
//mulai proses edit data
 
//cek dahulu, jika tombol simpan di klik
if(isset($_POST['submit'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('config/db.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$id			= $_POST['id'];	//membuat variabel $id dan datanya dari inputan hidden id
	$nama		= $_POST['nama'];	//membuat variabel $nis dan datanya dari inputan NIS
	$alamat		= $_POST['alamat'];	//membuat variabel $nama dan datanya dari inputan Nama Lengkap
	$tempat		= $_POST['tempat'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$tangal	= $_POST['tangal'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$username	= $_POST['username'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$password	= $_POST['password'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	
	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
	$update = mysql_query("UPDATE petugas SET id_petugas='$id', nama_petugas='$nama', alamat_petugas='$alamat', tempat_lahir_petugas='$tempat', tanggal_lahir_petugas='$tangal', username_petugas='$username', password_petugas='$password' WHERE id_petugas='$id'") or die(mysql_error());
	
	//jika query update sukses
	if($update){
		
		echo 'Data berhasil di simpan! ';		//Pesan jika proses simpan sukses
		echo '<a href="?p=user/index">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}else{
		
		echo 'Gagal menyimpan data! ';		//Pesan jika proses simpan gagal
		echo '<a href="index.php?p=user/edit&id='.$id.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}
 
}else{	//jika tidak terdeteksi tombol simpan di klik
 
	//redirect atau dikembalikan ke halaman edit
	echo '<script>window.history.back()</script>';
 
}
?>