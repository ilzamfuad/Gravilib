
	<h3>Report</h3>
	
	<table class="ui fixed celled table">
	<thead>
		<tr bgcolor="#CCCCCC">
			<th style="width: 40px;">No.</th>
			<th>Nama User</th>
			<th>Nama Buku</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Kembali</th>
			<th>Nama Petugas</th>
		</tr></thead>
		
		<?php
		
		include('config/db.php');

		$halaman = 10;
		  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
		  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
		  $result = mysql_query("SELECT * FROM perpus");
		  $total = mysql_num_rows($result);

		  $pages = ceil($total/$halaman);   

		$query = mysql_query("SELECT * FROM konfirmasi_kembali ORDER BY id_konfirmasi ASC LIMIT $mulai, $halaman") or die(mysql_error());
		$no =$mulai+1;
		
		if(mysql_num_rows($query) == 0){	
			echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
			
		}else{	
			$no = 1;	
			while($data = mysql_fetch_assoc($query)){	
				echo '<tr>';
					echo '<td>'.$no.'</td>';	

					$booking = $data['id_booking'];
					$querybooking = mysql_query("SELECT * FROM booking WHERE id_booking = '$booking'") or die(mysql_error());
					$databooking = mysql_fetch_assoc($querybooking);

					$user = $databooking['id_user'];
					$queryuser = mysql_query("SELECT nama_user FROM user WHERE id_user = '$user'") or die(mysql_error());
					$datauser = mysql_fetch_assoc($queryuser);
					echo '<td>'.$datauser['nama_user'].'</td>';

					$buku = $databooking['id_buku'];
					$querybuku = mysql_query("SELECT nama_buku FROM buku WHERE id_buku = '$buku'") or die(mysql_error());
					$databuku = mysql_fetch_assoc($querybuku);
					echo '<td>'.$databuku['nama_buku'].'</td>';	

					echo '<td>'.$data['tgl_pinjam'].'</td>';	
					echo '<td>'.$data['tgl_kembali'].'</td>';

					$petugas = $data['id_petugas'];
					$querypetugas = mysql_query("SELECT nama_petugas FROM petugas WHERE id_petugas = '$petugas'") or die(mysql_error());
					$datapetugas = mysql_fetch_assoc($querypetugas);
					echo '<td>'.$datapetugas['nama_petugas'].'</td>';
					
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
 