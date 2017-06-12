<?php

	include('config/db.php');
	
	//membuat variabel $id yg bernilai dari URL GET id -> hapus.php?id=siswa_id
	$id = $_GET['id'];
	$date = date("Y-m-d");
	$petugas = "";
	$tanggal = "";
	
	//cek ke database apakah ada data siswa dengan siswa_id='$id'
	$cek = mysql_query("SELECT id_booking FROM booking WHERE id_booking='$id'") or die(mysql_error());
	
	//jika data siswa tidak ada
	if(mysql_num_rows($cek) == 0){
		
		//jika data tidak ada, maka redirect atau dikembalikan ke halaman beranda
		echo '<script>window.history.back()</script>';
	
	}else{
		$querypetugas = mysql_query("SELECT * FROM petugas WHERE username_petugas = '$login_session'") or die(mysql_error());
	    while($datapetugas = mysql_fetch_assoc($querypetugas)){
	        $petugas = $datapetugas['id_petugas'];
	    }

	    $querytanggal = mysql_query("SELECT * FROM booking WHERE id_booking = '$id'") or die(mysql_error());
	    while($datatanggal = mysql_fetch_assoc($querytanggal)){
	        $tanggal = $datatanggal['tanggal_peminjam'];
	    }


		$input = mysql_query("INSERT INTO konfirmasi_kembali VALUES(NULL, '$id', '$tanggal', '$date', 0,'$petugas')") or die(mysql_error());

		if($input){
			$del = mysql_query("DELETE FROM booking WHERE id_booking='$id'");

			if($del){
				echo 'Buku Berhasil Kembali! ';		//Pesan jika proses hapus berhasil
				echo '<a href="?p=resepsionis/index">Kembali</a>';	//membuat Link untuk kembali ke halaman beranda
			}
		}else{
			echo 'Pengembalian Gagal! ';		//Pesan jika proses hapus gagal
			echo '<a href="?p=resepsionis/index">Kembali</a>';	//membuat Link untuk kembali ke halaman beranda
		}
		
		
	}

?>