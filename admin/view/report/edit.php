	<h2>Edit Data Perpustakaan</h2>
	
	<p><a href="?p=perpus/index-book">Beranda</a> / <a href="?p=perpus/tambah">Tambah Data</a></p>

	<?php
	//proses mengambil data ke database untuk ditampilkan di form edit berdasarkan siswa_id yg didapatkan dari GET id -> edit.php?id=siswa_id
	
	//include atau memasukkan file koneksi ke database
	include('config/db.php');
	
	//membuat variabel $id yg nilainya adalah dari URL GET id -> edit.php?id=siswa_id
	$id = $_GET['id'];
	
	//melakukan query ke database dg SELECT table siswa dengan kondisi WHERE siswa_id = '$id'
	$show = mysql_query("SELECT * FROM perpus WHERE id_perpus='$id'");
	
	//cek apakah data dari hasil query ada atau tidak
	if(mysql_num_rows($show) == 0){
		
		//jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
		echo '<script>window.history.back()</script>';
		
	}else{
	
		//jika data ditemukan, maka membuat variabel $data
		$data = mysql_fetch_assoc($show);	//mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
	
	}
	?>
	
	<form class="ui form" action="?p=perpus/edit-proses" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">	<!-- membuat inputan hidden dan nilainya adalah siswa_id -->
		<div class="field">
			<label>Nama Perpus</label>
		    <input type="text" name="nama" value="<?php echo $data['nama_perpus']; ?>" placeholder="Nama Perpus" required>
		</div>
		<div class="field">
			<label>Alamat Perpus</label>
		    <input type="text" name="alamat" value="<?php echo $data['alamat_perpus']; ?>" placeholder="Tahun Terbit" required>
		</div>
		<div class="field">
			<label>Deskripsi Perpus</label>
		    <input type="text" name="deskripsi" value="<?php echo $data['deskripsi_perpus']; ?>" placeholder="Deskripsi Perpus" required>
		</div>
		<div class="field">
			<label>Latitude</label>
		    <input type="text" name="latitude" value="<?php echo $data['latitude']; ?>" placeholder="Latitude" required>
		</div>
		<div class="field">
			<label>Longitude</label>
		    <input type="text" name="longitude" value="<?php echo $data['longitude']; ?>" placeholder="Longitude" required>
		</div>
		<input class="ui green button" type="submit" name="submit" value="Simpan">
		
			
	</form>