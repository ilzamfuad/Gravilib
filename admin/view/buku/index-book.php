
	<h2>Data Buku</h2>
	
	<p><a class="ui blue button" href="?p=buku/tambah">Tambah Data</a></p>

	
	<table class="ui fixed celled table">
		<thead>
		<tr bgcolor="#CCCCCC">
			<th style="width: 40px;">No.</th>
			<th>Nama Buku</th>
			<th>Tahun Terbit</th>
			<th>Deskripsi Buku</th>
			<th>Id. kategori</th>
			<th>Id. Penerbit</th>
			<th>Id. Perpus</th>
			<th>Action</th>
		</tr></thead>
		
		<?php
		
		include('config/db.php');

		$halaman = 10;
		  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
		  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
		  $result = mysql_query("SELECT * FROM buku");
		  $total = mysql_num_rows($result);

		  $pages = ceil($total/$halaman);   
		
		$query = mysql_query("SELECT * FROM buku ORDER BY nama_buku DESC LIMIT $mulai, $halaman") or die(mysql_error());
		 $no =$mulai+1;

		 
		
		if(mysql_num_rows($query) == 0){	
			
			
			echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
			
		}else{	
			
			
			$no = 1;	
			while($data = mysql_fetch_assoc($query)){	
			
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$data['nama_buku'].'</td>';	
					echo '<td>'.$data['tahun_terbit'].'</td>';	
					echo '<td>'.$data['deskripsi_buku'].'</td>';

					$kategoridata = $data['id_kategori'];

					$resultkategori = mysql_query("SELECT * FROM kategori WHERE id_kategori='$kategoridata'");
					while ($rowkategori = mysql_fetch_array($resultkategori)) {
							echo '<td>'.$rowkategori['kategori'].'</td>';
					}	
					// echo '<td>'.$data['id_kategori'].'</td>';

					$penerbitdata = $data['id_penerbit'];

					$resultpenerbit = mysql_query("SELECT * FROM penerbit WHERE id_penerbit='$penerbitdata'");
					while ($rowpenerbit = mysql_fetch_array($resultpenerbit)) {
							echo '<td>'.$rowpenerbit['nama_penerbit'].'</td>';
					}
					//echo '<td>'.$data['id_penerbit'].'</td>';

					$perpusdata = $data['id_perpus'];

					$resultperpus = mysql_query("SELECT * FROM perpus WHERE id_perpus='$perpusdata'");
					while ($rowperpus = mysql_fetch_array($resultperpus)) {
							echo '<td>'.$rowperpus['nama_perpus'].'</td>';
					}
					//echo '<td>'.$data['id_perpus'].'</td>';	
					
					echo '<td><a  href="index.php?p=buku/edit&id='.$data['id_buku'].'"><i class="edit icon"></i></a>  <a  href="index.php?p=buku/hapus&id='.$data['id_buku'].'" onclick="return confirm(\'Yakin?\')"><i class="trash icon"></i></a></td>';	
				echo '</tr>';
				
				$no++;	
				
			}
			
		}
		?>
	</table>

<?php
	if(!empty($_REQUEST['halaman'])){
  		$activePage = $_REQUEST['halaman'];
  	}
?>
<br></br>
<div class="ui pagination menu">
  <?php for ($i=1; $i<=$pages ; $i++){ ?>
  <a href="?p=buku/index-book&halaman=<?php echo $i; ?>" class="<?php if ($activePage==$i) {echo "item active"; } else  {echo "item";}?>"><?php echo $i; ?></a>
 
  <?php } ?>
 
