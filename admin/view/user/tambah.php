	<?php 
		include('config/db.php');
	?>

	<h2>Tambah Data Petugas</h2>

	<form class="ui form" action="?p=user/tambah-proses" method="post">
		<div class="field">
			<label>Nama Petugas</label>
		    <input type="text" name="nama_petugas" placeholder="Nama Petugas" required>
		</div>
		<div class="field">
			<label>Alamat</label>
		    <input type="text" name="alamat" placeholder="Alamat" required>
		</div>
		<div class="field">
			<label>Tempat Lahir</label>
		    <input type="text" name="tempat" placeholder="Tempat Lahir" required>
		</div>
		<div class="field">
			<label>Tangga Lahir</label>
		    <input id="datepicker" type="text" name="tangal" placeholder="Tanggal Lahir" required>
		</div>
		<div class="field">
			<label>Username</label>
		    <input type="text" name="username" placeholder="Username" required>
		</div>
		<div class="field">
			<label>Password</label>
		    <input type="text" name="password" placeholder="Password" required>
		</div>

		<input class="ui primary button" type="submit" name="submit" value="Tambah"></td>
		<a class="ui red button" href="?p=user/index">Batal</a>
			
	</form>