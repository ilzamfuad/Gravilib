<?php
$admin = "";
  if(!empty($_REQUEST['p'])){
    $activePage = $_REQUEST['p'];
  }else{
    $activePage = "content-home";
  }
 
  include('config/db.php');
  if(!empty($_SESSION['login_user_admin'])){
  $userCheck = $_SESSION['login_user_admin'];
  }else{
    $userCheck = "";
  }
  $query = mysql_query("SELECT * FROM petugas WHERE nama_petugas='$userCheck'") or die(mysql_error());

  while($data = mysql_fetch_assoc($query)){ 
          if($data['status_petugas'] == "1"){
            $admin = "1";
          }else{
            $admin = "2";
          }
      }
?>

<div class="ui divider"></div>
  <br>
  <div class="ui grid">
    <div class="three wide column" id="side">
      <div class="ui secondary vertical fluid menu">

      <!-- admin -->
      <?php if($admin == "1"){ ?>
        <a class="<?php if ($activePage=="content-home") {echo "item active"; } else  {echo "item";}?>" href="?p=content-home">
        Home
        </a>

        <a class="<?php if ($activePage=="user/index") {echo "item active"; } else  {echo "item";}?>" href="?p=user/index">
        User Management
        </a>

        <a class="<?php if ($activePage=="buku/index-book") {echo "item active"; } else  {echo "item";}?>" href="?p=buku/index-book">
        Buku
        </a>

        <a class="<?php if ($activePage=="perpus/index") {echo "item active"; } else  {echo "item";}?>" href="?p=perpus/index">
        Perpustakaan
        </a>

        <a class="<?php if ($activePage=="report/index") {echo "item active"; } else  {echo "item";}?>" href="?p=report/index">
        Report
        </a>

        <!-- resepsionis -->
        <?php }else{ ?>
        <a class="<?php if ($activePage=="content-home") {echo "item active"; } else  {echo "item";}?>" href="?p=content-home">
        Home
        </a>

        <a class="<?php if ($activePage=="resepsionis/index") {echo "item active"; } else  {echo "item";}?>" href="?p=resepsionis/index">
        Peminjaman
        </a>
        <?php } ?>
      </div>
    </div>
    

