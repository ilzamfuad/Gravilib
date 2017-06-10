<?php
//mulai proses edit data
 
//cek dahulu, jika tombol simpan di klik
if(isset($_POST['submit'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('config/db.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$id			= $_POST['id'];	//membuat variabel $id dan datanya dari inputan hidden id
	$nama_buku		= $_POST['nama_buku'];	//membuat variabel $nis dan datanya dari inputan NIS
	$tahun_terbit		= $_POST['tahun_terbit'];	//membuat variabel $nama dan datanya dari inputan Nama Lengkap
	$deskripsi		= $_POST['deskripsi'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$kategori	= $_POST['kategori'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$penerbit	= $_POST['penerbit'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$perpus	= $_POST['perpus'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	
	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
	$update = mysql_query("UPDATE buku SET id_buku='$id', nama_buku='$nama_buku', tahun_terbit='$tahun_terbit', deskripsi_buku='$deskripsi', id_kategori='$kategori', id_penerbit='$penerbit', id_perpus='$perpus' WHERE id_buku='$id'") or die(mysql_error());
	
	//jika query update sukses
	if($update){
		
		echo 'Data berhasil di simpan! ';		//Pesan jika proses simpan sukses
		echo '<a href="?p=buku/index-book">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}else{
		
		echo 'Gagal menyimpan data! ';		//Pesan jika proses simpan gagal
		echo '<a href="index.php?p=buku/edit&id='.$id.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}
 
}else{	//jika tidak terdeteksi tombol simpan di klik
 
	//redirect atau dikembalikan ke halaman edit
	echo '<script>window.history.back()</script>';
 
}
?>