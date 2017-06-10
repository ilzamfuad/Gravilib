<?php
	include('view/session.php');
?>

<header>

    <!--Folowing Menu-->
    <div id="nav-header" class="ui fixed hidden square borderless menu">
        <div class="ui container">
            <div class="item">
                <a href="">
                    <img class="ui small image" src="public/images/logo.png">
                </a>
            </div>

            <div class="right menu">

                <div class="ui dropdown item">
                  <div class="text">Welcome : <?php echo $login_session?></div>
                  <i class="dropdown icon"></i>
                  <div class="menu">
                    <div href="view/Logout.php" class="item">
                        Logout
                    </div>
                  </div>
                </div>
                
            </div>
        </div>
    </div>

    <!--Menu-->
    <div id="nav-header" class="ui square borderless menu">
        <div class="ui container">
            <div class="item">
                <a href="">
                    <img class="ui small image" src="public/images/logo.png">
                </a>
            </div>

            <div class="right menu">

                <div class="ui dropdown item" >
                  <div class="text">Welcome : <?php echo $login_session?></div>
                  <i class="dropdown icon"></i>
                  <div class="menu">
                    <a href="view/Logout.php" class="item">
                        Logout
                    </a>
                  </div>
                </div>
                
            </div>
        </div>
    </div>
</header>
<script>
    $('.ui.dropdown').dropdown('hide');
</script>
