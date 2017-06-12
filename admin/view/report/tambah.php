	<?php 
		include('config/db.php');
	?>

	<h2>Tambah Data perpus</h2>
	
	<p><a href="?p=perpus/index-book">Beranda</a> / <a href="?p=perpus/tambah">Tambah Data</a></p>
	
	<form class="ui form" action="?p=perpus/tambah-proses" method="post">
		<div class="field">
			<label>Nama Perpus</label>
		    <input type="text" name="nama" placeholder="Nama Perpus" required>
		</div>
		<div class="field">
			<label>Alamat Perpus</label>
		    <input type="text" name="alamat" placeholder="Alamat Perpus" required>
		</div>
		<div class="field">
			<label>Deskripsi Perpus</label>
		    <input type="text" name="deskripsi" placeholder="Deskripsi Perpus" required>
		</div>
		<div class="field">
			<label>Latitude</label>
		    <input type="text" name="latitude" placeholder="Latitude" required>
		</div>
		<div class="field">
			<label>Longitude</label>
		    <input type="text" name="longitude" placeholder="Longitude" required>
		</div>

		<input class="ui primary button" type="submit" name="submit" value="Tambah"></td>
			
	</form>