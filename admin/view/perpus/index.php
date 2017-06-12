
	<h2>Simple CRUD</h2>
	
	<p><a class="ui blue button" href="?p=perpus/tambah">Tambah Data</a></p>
	
	<h3>Data Buku</h3>
	
	<table class="ui fixed celled table">
	<thead>
		<tr bgcolor="#CCCCCC">
			<th style="width: 40px;">No.</th>
			<th>Nama Perpus</th>
			<th>Alamat Perpus</th>
			<th>Deskripsi Perpus</th>
			<th>Latitude</th>
			<th>Longitude</th>
			<th>Action</th>
		</tr></thead>
		
		<?php
		
		include('config/db.php');

		$halaman = 10;
		  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
		  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
		  $result = mysql_query("SELECT * FROM perpus");
		  $total = mysql_num_rows($result);

		  $pages = ceil($total/$halaman);   

		$query = mysql_query("SELECT * FROM perpus ORDER BY nama_perpus DESC LIMIT $mulai, $halaman") or die(mysql_error());
		$no =$mulai+1;
		
		if(mysql_num_rows($query) == 0){	
			echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
			
		}else{	
			$no = 1;	
			while($data = mysql_fetch_assoc($query)){	
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$data['nama_perpus'].'</td>';	
					echo '<td>'.$data['alamat_perpus'].'</td>';	
					echo '<td>'.$data['deskripsi_perpus'].'</td>';	
					echo '<td>'.$data['latitude'].'</td>';
					echo '<td>'.$data['longitude'].'</td>';
					
					echo '<td><a  href="index.php?p=perpus/edit&id='.$data['id_perpus'].'"><i class="edit icon"></i></a> <a  href="index.php?p=perpus/hapus&id='.$data['id_perpus'].'" onclick="return confirm(\'Yakin?\')"><i class="trash icon"></i></a></td>';	
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
  <a href="?p=perpus/index&halaman=<?php echo $i; ?>" class="<?php if ($activePage==$i) {echo "item active"; } else  {echo "item";}?>"><?php echo $i; ?></a>
 
  <?php } ?>
 