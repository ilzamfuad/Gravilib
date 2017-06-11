<?php
    include('view/session.php');
?>

<header>

    <!--Folowing Menu-->
    <div id="nav-header" class="ui inverted fixed hidden square borderless menu">
        <div class="ui container">
            <div class="item">
                <a href="">
                    <img class="ui small image" src="public/images/logo.png">
                </a>
            </div>
            <a href="?p=content-home" class="active item">Home</a>
            <a href="?p=content-library" class="item">Library</a>
            <a href="?p=content-book" class="item">Book</a>

            <div class="right menu">
                <div class="item">
                    <div class="ui transparent icon input">
                        <input placeholder="Search..." type="text" style="color: white">
                        <button class="ui icon grey button">
                            <i class="search icon"></i>
                        </button>
                    </div>
                </div>
                <div class="item">
                    <a href="?p=cart" class="item">
                        <div class="ui header cart">
                            <i class="big blue add to cart icon"></i>
                        </div>
                    </a>
                </div>
                
                <div class="ui dropdown item">
                  <div class="text">Welcome : <?php echo $login_session?></div>
                  <i class="dropdown icon"></i>
                  <div class="menu">
                    <div class="item">
                        <a href="view/Logout.php" id="button-login">Logout</a>
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
            <a href="?p=content-home" class="active item">Home</a>
            <a href="?p=content-library" class="item">Library</a>
            <a href="?p=content-book" class="item">Book</a>

            <div class="right menu">
                <div class="item">
                    <div class="ui transparent icon input">
                        <input placeholder="Search..." type="text">
                        <button class="ui icon gray button">
                            <i class="search icon"></i>
                        </button>
                    </div>
                </div>
                <div class="item">
                    <a href="?p=cart" class="item">
                        <div class="ui header cart">
                            <i class="big blue add to cart icon"></i>
                        </div>
                    </a>
                </div>
                
                <div class="ui dropdown item" >
                  <div class="text">Welcome : <?php echo $login_session?></div>
                  <i class="dropdown icon"></i>
                  <div class="menu">
                    <div class="item">
                        <a href="view/Logout.php" id="button-login">Logout</a>
                    </div>
                  </div>
                </div>
                
            </div>
        </div>
    </div>
</header>
<script>
    $('.ui.dropdown').dropdown('hide');
</script>
