	<h2>Edit Data Petugas</h2>
	
	<?php
	//proses mengambil data ke database untuk ditampilkan di form edit berdasarkan siswa_id yg didapatkan dari GET id -> edit.php?id=siswa_id
	
	//include atau memasukkan file koneksi ke database
	include('config/db.php');
	
	//membuat variabel $id yg nilainya adalah dari URL GET id -> edit.php?id=siswa_id
	$id = $_GET['id'];
	
	//melakukan query ke database dg SELECT table siswa dengan kondisi WHERE siswa_id = '$id'
	$show = mysql_query("SELECT * FROM petugas WHERE id_petugas='$id'");
	
	//cek apakah data dari hasil query ada atau tidak
	if(mysql_num_rows($show) == 0){
		
		//jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
		echo '<script>window.history.back()</script>';
		
	}else{
	
		//jika data ditemukan, maka membuat variabel $data
		$data = mysql_fetch_assoc($show);	//mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
	
	}
	?>
	
	<form class="ui form" action="?p=user/edit-proses" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">	<!-- membuat inputan hidden dan nilainya adalah siswa_id -->
		<div class="field">
			<label>Nama Petugas</label>
		    <input type="text" name="nama" value="<?php echo $data['nama_petugas']; ?>" placeholder="Nama Petugas" required>
		</div>
		<div class="field">
			<label>Alamat</label>
		    <input type="text" name="alamat" value="<?php echo $data['alamat_petugas']; ?>" placeholder="Alamat" required>
		</div>
		<div class="field">
			<label>Tempat Lahir</label>
		    <input type="text" name="tempat" value="<?php echo $data['tempat_lahir_petugas']; ?>" placeholder="Tempat Lahir" required>
		</div>
		<div class="field">
			<label>Tanggal Lahir</label>
		    <input id="datepicker" type="text" name="tangal" value="<?php echo $data['tanggal_lahir_petugas']; ?>" placeholder="Tangga Lahir" required>
		</div>
		<div class="field">
			<label>Username</label>
		    <input type="text" name="username" value="<?php echo $data['username_petugas']; ?>" placeholder="Username" required>
		</div>
		<div class="field">
			<label>Password</label>
		    <input type="text" name="password" value="<?php echo $data['password_petugas']; ?>" placeholder="Password" required>
		</div>

			<input class="ui green button" type="submit" name="submit" value="Simpan">
			<a class="ui red button" href="?p=user/index">Batal</a>
	</form>