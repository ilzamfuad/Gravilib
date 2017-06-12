	<?php 
		include('config/db.php');
	?>

	<h2>Tambah Data Buku</h2>
	
	<form class="ui form" action="?p=buku/tambah-proses" method="post">
		<div class="field">
			<label>Nama Buku</label>
		    <input type="text" name="nama_buku" placeholder="Nama Buku" required>
		</div>
		<div class="field">
			<label>Tahun Terbit</label>
		    <input id="datepicker" type="text" name="tahun_terbit" placeholder="Tahun Terbit" required>
		</div>
		<div class="field">
			<label>Deskripsi Buku</label>
		    <input type="text" name="deskripsi" placeholder="Deskripsi Buku" required>
		</div>
		<div class="field">
			<label>Kategori</label>
			<select name="kategori" class="ui fluid dropdown" required>
			<option value="">Pilih Kategori</option>
						<?php 
							$sqlkategori = "SELECT * FROM kategori";

							$resultkategori = mysql_query($sqlkategori);
							while ($rowkategori = mysql_fetch_array($resultkategori)) {
							    
								echo "<option value='" . $rowkategori['id_kategori'] . "'>" . $rowkategori['kategori'] . "</option>";
							}
						?>

					</select>
		</div>
		<div class="field">
			<label>Penerbit</label>
			<select name="penerbit" class="ui fluid dropdown" required>
			<option value="">Pilih Penerbit</option>
						<?php 
							$sqlpenerbit = "SELECT id_penerbit,nama_penerbit FROM penerbit";

							$resultpenerbit = mysql_query($sqlpenerbit);
							while ($rowpenerbit = mysql_fetch_array($resultpenerbit)) {
							    
								echo "<option value='" . $rowpenerbit['id_penerbit'] . "'>" . $rowpenerbit['nama_penerbit'] . "</option>";
							}
						?>
					</select>
		</div>
		<div class="field">
			<label>Perpustakaan</label>
			<select name="perpus" class="ui fluid dropdown" required>
			<option value="">Pilih Perpustakaan</option>
						<?php 
							$sqlperpus = "SELECT id_perpus,nama_perpus FROM perpus";

							$resultperpus = mysql_query($sqlperpus);
							while ($rowperpus = mysql_fetch_array($resultperpus)) {
							    
								echo "<option value='" . $rowperpus['id_perpus'] . "'>" . $rowperpus['nama_perpus'] . "</option>";
							}
						?>
					</select>
		</div>

		<input class="ui primary button" type="submit" name="submit" value="Tambah">
		<a class="ui red button" href="?p=buku/index-book">Batal</a>
	</form>