<?php
//mulai proses edit data
 
//cek dahulu, jika tombol simpan di klik

	
	//inlcude atau memasukkan file koneksi ke database
	include('config/db.php');
	$date = date("Y-m-d");
	$id = $_GET['id'];

	$update = mysql_query("UPDATE booking SET tanggal_peminjam='$date', status_pinjam=1 WHERE id_booking='$id'") or die(mysql_error());
	
	//jika query update sukses
	if($update){
		
		echo 'Buku Dipinjam! ';		//Pesan jika proses simpan sukses
		echo '<a href="?p=resepsionis/index">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}else{
		
		echo 'Gagal Meminjam Buku! ';		//Pesan jika proses simpan gagal
		echo '<a href="index.php?p=perpus/edit&id='.$id.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}
 

?>