<div class="ui grid">
    <div class="three wide column" id="side">
      <img src="public/images/logo-sementara.png">
      <?php 
      $user = $login_session;
      $book = $_GET['buku'];
      ?>
      <div>
      <a class="ui teal button" href=<?php echo '"?p=booking-proses&user='.$user.'&buku='.$book.'"' ?>>Pesan</a></div>
    </div>
    <div class="twelve wide column">
    <?php 
       $connection = mysql_connect("localhost", "root", "") or die("gak isok konek");
       $db = mysql_select_db("perpustakaan", $connection);
       if(empty($_GET['buku'])){
         $_GET['buku'] = "";
        }
        $namabuku = $_GET['buku'];
       $query = mysql_query("select * from buku WHERE nama_buku = '$namabuku'", $connection);

        while($data = mysql_fetch_assoc($query)){
          echo '<h1 class="ui header">'.$data['nama_buku'].'</h1>
       
          <h3 class="ui header">Kategori</h3>';
          
          $kategoridata = $data['id_kategori'];
          $querykategori = mysql_query("select * from kategori WHERE id_kategori='$kategoridata'", $connection);
           while($datakategori = mysql_fetch_assoc($querykategori)){
            echo '<div class="sub header">'.$datakategori['kategori'].'</div>';
           }

           echo '<h3 class="ui header">Penerbit</h3>';
          $penerbitdata = $data['id_penerbit'];
          $querypenerbit = mysql_query("select * from penerbit WHERE id_penerbit='$penerbitdata'", $connection);
           while($datapenerbit = mysql_fetch_assoc($querypenerbit)){
            echo '<div class="sub header">'.$datapenerbit['nama_penerbit'].'</div>';
           }

           echo '<h3 class="ui header">Perpustakaan</h3>';
          $perpusdata = $data['id_perpus'];
          $queryperpus = mysql_query("select * from perpus WHERE id_perpus='$perpusdata'", $connection);
           while($dataperpus = mysql_fetch_assoc($queryperpus)){
            echo '<div class="sub header">'.$dataperpus['nama_perpus'].'</div>';
            $lat = $dataperpus['latitude'];
            $long = $dataperpus['longitude'];
            
           }

           echo '<h3 class="ui header">Deskripsi</h3>';
          echo '<div class="sub header">'.$data['deskripsi_buku'].'</div>';


        }
    ?>
    
    </div>
    <div id="map-container">
    <h3 class="ui header">Location</h3>
    <div id="map" style="width:100%;height:400px;"></div>
    </div>
    <script>

      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: new google.maps.LatLng(<?php echo $lat.','.$long; ?>),
        });

        <?php 
        $query1 = mysql_query("select * from buku WHERE nama_buku = '$namabuku'", $connection);
        while($data1 = mysql_fetch_assoc($query1)){
          $perpusdata1 = $data1['id_perpus'];
          $queryperpus1 = mysql_query("select * from perpus WHERE id_perpus='$perpusdata1'", $connection);
        while($dataperpus1 = mysql_fetch_assoc($queryperpus1)){ ?>

        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(<?php echo $dataperpus1['latitude'].','.$dataperpus1['longitude']; ?>),
          map: map,
          title: 'Hello World!'
        });
      <?php } }?>
    }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtM1edC1-5vmP1FNZulvvLjr71wuWkrrU&callback=initMap">
    </script>
</div>