

<div class="ui divider"></div>
  <br>
  <div class="ui grid">
    <div class="three wide column" id="side">
      <div class="ui secondary vertical fluid menu">
      <?php 
                $connection = mysql_connect("localhost", "root", "") or die("gak isok konek");
                $db = mysql_select_db("perpustakaan", $connection);
                $query = mysql_query("select * from kategori", $connection);

                while($data = mysql_fetch_assoc($query)){
                  echo  '<a class="item" href="?p=content-book&data='.$data['id_kategori'].'">'.
                    $data['kategori'].
                    '</a>';
                  }
        ?>
        
       
      </div>
    </div>
    <div class="twelve wide column">
    <h2>List Buku</h2>
        <div class="ui container">
                                <div class="ui three stackable cards">
                                <?php 
                                  if(empty($_GET['data'])){
                                    $_GET['data'] = "1";
                                  }

                                  $kategoridata = $_GET['data'];

                                $querybuku = mysql_query("select * from buku WHERE id_kategori='$kategoridata' ORDER BY id_buku DESC", $connection);

                                while($databuku = mysql_fetch_assoc($querybuku)){
                                    echo '<div class="card">';
                                    echo '<a class="image" href="#"></a>';
                                    echo '<div class="content">';
                                    echo '<a class="header" href="#">'.$databuku['nama_buku'].'</a>';
                                    echo '<div class="description">
                                              '.$databuku['deskripsi_buku'].'
                                            </div>';
                                    echo '</div>
                                        </div>';
                                      }
                                ?>

                                </div>
                            </div>
    </div>