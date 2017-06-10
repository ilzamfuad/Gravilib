<?php
//mulai proses tambah data
 
//cek dahulu, jika tombol tambah di klik
if(isset($_POST['submit'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('config/db.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$nama_buku		= $_POST['nama_buku'];	//membuat variabel $nis dan datanya dari inputan NIS
	$tahun_terbit		= $_POST['tahun_terbit'];	//membuat variabel $nama dan datanya dari inputan Nama Lengkap
	$deskripsi		= $_POST['deskripsi'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$kategori	= $_POST['kategori'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$penerbit	= $_POST['penerbit'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$perpus	= $_POST['perpus'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan

	
	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$input = mysql_query("INSERT INTO buku VALUES(NULL, '$nama_buku', '$tahun_terbit', '$deskripsi', '$kategori', '$penerbit', '$perpus')") or die(mysql_error());
	
	//jika query input sukses
	if($input){
		
		echo 'Data berhasil di tambahkan! ';		//Pesan jika proses tambah sukses
		echo '<a href="?p=buku/index-book">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		
	}else{
		
		echo 'Gagal menambahkan data! ';		//Pesan jika proses tambah gagal
		echo '<a href="tambah.php">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		
	}
 
}else{	//jika tidak terdeteksi tombol tambah di klik
 
	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';
 
}
?>