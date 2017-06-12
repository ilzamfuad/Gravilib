
	<h2>Data Booking</h2>
	
	<table class="ui fixed celled table">
	<thead>
		<tr bgcolor="#CCCCCC">
			<th style="width: 40px;">No.</th>
			<th>Nama User</th>
			<th>Nama Buku</th>
			<th>Tanggal Booking</th>
			<th>Tanggal Pinjam</th>
			<th>Status Pinjam</th>
			<th>Action</th>
		</tr></thead>
		
		<?php
		
		include('config/db.php');

		$halaman = 10;
		  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
		  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
		  $result = mysql_query("SELECT * FROM booking");
		  $total = mysql_num_rows($result);

		  $pages = ceil($total/$halaman);   

		$query = mysql_query("SELECT * FROM booking ORDER BY id_booking ASC LIMIT $mulai, $halaman") or die(mysql_error());
		$no =$mulai+1;
		
		if(mysql_num_rows($query) == 0){	
			echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
			
		}else{	
			$no = 1;	
			while($data = mysql_fetch_assoc($query)){	
				echo '<tr>';
					echo '<td>'.$no.'</td>';	

					$user = $data['id_user'];
					$queryuser = mysql_query("SELECT * FROM user WHERE id_user='$user'") or die(mysql_error());
					$datauser = mysql_fetch_assoc($queryuser);
					echo '<td>'.$datauser['nama_user'].'</td>';		

					$buku = $data['id_buku'];
					$querybuku = mysql_query("SELECT * FROM buku WHERE id_buku='$buku'") or die(mysql_error());
					$databuku = mysql_fetch_assoc($querybuku);
					echo '<td>'.$databuku['nama_buku'].'</td>';

					echo '<td>'.$data['tanggal_booking'].'</td>';
					echo '<td>'.$data['tanggal_peminjam'].'</td>';
					if($data['status_pinjam'] == "0"){
						echo '<td>Pending</td>';	
					}else{
						echo '<td>Dipinjam</td>';
					}	

					if($data['status_pinjam'] == 0){
					echo '<td><a class="ui green button" href="index.php?p=resepsionis/pinjam-proses&id='.$data['id_booking'].'">Pinjam</i></a>';
					}else{
						echo '<td>';
					}

					echo '<a class="ui red button" href="index.php?p=resepsionis/kembali-proses&id='.$data['id_booking'].'" onclick="return confirm(\'Yakin Benar?\')">Kembali</i></a></td>';	
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
 