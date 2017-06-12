
	<h2>Data Petugas</h2>
	
	<p><a class="ui blue button" href="?p=user/tambah">Tambah Data</a></p>

	
	<table class="ui fixed celled table">
		<thead>
		<tr bgcolor="#CCCCCC">
			<th style="width: 40px;">No.</th>
			<th>Nama Petugas</th>
			<th>Alamat</th>
			<th>Tanggal Masuk</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Username</th>
			<th>Password</th>
			<th>Status</th>
			<th>Action</th>
		</tr></thead>
		
		<?php
		
		include('config/db.php');

		$halaman = 10;
		  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
		  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
		  $result = mysql_query("SELECT * FROM petugas");
		  $total = mysql_num_rows($result);

		  $pages = ceil($total/$halaman);   
		
		$query = mysql_query("SELECT * FROM petugas ORDER BY id_petugas ASC LIMIT $mulai, $halaman") or die(mysql_error());
		 $no =$mulai+1;

		 
		
		if(mysql_num_rows($query) == 0){	
			
			
			echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
			
		}else{	
			
			
			$no = 1;	
			while($data = mysql_fetch_assoc($query)){	
			
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$data['nama_petugas'].'</td>';	
					echo '<td>'.$data['alamat_petugas'].'</td>';	
					echo '<td>'.$data['tanggal_masuk'].'</td>';
					echo '<td>'.$data['tempat_lahir_petugas'].'</td>';
					echo '<td>'.$data['tanggal_lahir_petugas'].'</td>';
					echo '<td>'.$data['username_petugas'].'</td>';
					echo '<td>'.$data['password_petugas'].'</td>';
					echo '<td>'.$data['status_petugas'].'</td>';
					
					echo '<td><a  href="index.php?p=user/edit&id='.$data['id_petugas'].'"><i class="edit icon"></i></a>  <a  href="index.php?p=user/hapus&id='.$data['id_petugas'].'" onclick="return confirm(\'Yakin?\')"><i class="trash icon"></i></a></td>';	
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
  <a href="?p=user/index-book&halaman=<?php echo $i; ?>" class="<?php if ($activePage==$i) {echo "item active"; } else  {echo "item";}?>"><?php echo $i; ?></a>
 
  <?php } ?>
 
