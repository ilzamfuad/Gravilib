	<h2>Edit Data Buku</h2>

	<?php
	//proses mengambil data ke database untuk ditampilkan di form edit berdasarkan siswa_id yg didapatkan dari GET id -> edit.php?id=siswa_id
	
	//include atau memasukkan file koneksi ke database
	include('config/db.php');
	
	//membuat variabel $id yg nilainya adalah dari URL GET id -> edit.php?id=siswa_id
	$id = $_GET['id'];
	
	//melakukan query ke database dg SELECT table siswa dengan kondisi WHERE siswa_id = '$id'
	$show = mysql_query("SELECT * FROM buku WHERE id_buku='$id'");
	
	//cek apakah data dari hasil query ada atau tidak
	if(mysql_num_rows($show) == 0){
		
		//jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
		echo '<script>window.history.back()</script>';
		
	}else{
	
		//jika data ditemukan, maka membuat variabel $data
		$data = mysql_fetch_assoc($show);	//mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
	
	}
	?>
	
	<form class="ui form" action="?p=buku/edit-proses" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">	<!-- membuat inputan hidden dan nilainya adalah siswa_id -->
		<div class="field">
			<label>Nama Buku</label>
		    <input type="text" name="nama_buku" value="<?php echo $data['nama_buku']; ?>" placeholder="Nama Buku" required>
		</div>
		<div class="field">
			<label>Tahun Terbit</label>
		    <input id="datepicker" type="text" name="tahun_terbit" value="<?php echo $data['tahun_terbit']; ?>" placeholder="Tahun Terbit"  required>
		</div>
		<div class="field">
			<label>Deskripsi Buku</label>
		    <input type="text" name="deskripsi" value="<?php echo $data['deskripsi_buku']; ?>" placeholder="Deskripsi Buku Terbit" required>
		</div>
		<div class="field">
			<label>Kategori</label>
		    <select name="kategori" required>
			<!-- <option value="">Pilih Kategori</option> -->
						<?php 
							$sqlkategori = "SELECT * FROM kategori";

							$resultkategori = mysql_query($sqlkategori);
							while ($rowkategori = mysql_fetch_array($resultkategori)) {
							    
								echo "<option value='" . $rowkategori['id_kategori']."' ". (($data['id_kategori']==$rowkategori['id_kategori'])?"selected='selected'":'').">". $rowkategori['kategori']."</option>";
							
							}
						?>

					</select>
		</div>

		<div class="field">
			<label>Penerbit</label>
		    <select name="penerbit" required>
			<!-- <option value="">Pilih Penerbit</option> -->
						<?php 
							$sqlpenerbit = "SELECT id_penerbit,nama_penerbit FROM penerbit";

							$resultpenerbit = mysql_query($sqlpenerbit);
							while ($rowpenerbit = mysql_fetch_array($resultpenerbit)) {
							    
								echo "<option value='" . $rowpenerbit['id_penerbit']."' ". (($data['id_penerbit']==$rowpenerbit['id_penerbit'])?"selected='selected'":'').">". $rowpenerbit['nama_penerbit']."</option>";
							}
						?>
					</select>
		</div>

		<div class="field">
			<label>Perpustakaan</label>
		    <select name="perpus" required>
			<!-- <option value="">Pilih Jurusan</option> -->
						<?php 
							$sqlperpus = "SELECT id_perpus,nama_perpus FROM perpus";

							$resultperpus = mysql_query($sqlperpus);
							while ($rowperpus = mysql_fetch_array($resultperpus)) {
							    
								echo "<option value='" . $rowperpus['id_perpus']."' ". (($data['id_perpus']==$rowperpus['id_perpus'])?"selected='selected'":'').">". $rowperpus['nama_perpus']."</option>";

							}
						?>
					</select>
		</div>

			<input class="ui green button" type="submit" name="submit" value="Simpan">
			<a class="ui red button" href="?p=buku/index-book">Batal</a>
	</form>