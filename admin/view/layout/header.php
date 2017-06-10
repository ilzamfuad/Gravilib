<?php

if(isset($_SESSION['login_user_admin'])){
      header("location: ../index.php");
}
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
            <a href="?p=content-home" class="active item">Home</a>
            <a href="?p=content-library" class="item">Messages</a>
            <a href="?p=content-book" class="item">Friends</a>

            <div class="right menu">
                <div class="item">
                    <a href="?p=cart" class="item">
                        <div class="ui header cart">
                            <i class="big blue add to cart icon"></i>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="view/LoginForm.php" class="ui button" id="button-login">Login</a>
                </div>
                <div class="item">
                    <a class="ui primary button" id="button-login">Sign Up</a>
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
            <a href="?p=content-library" class="item">Messages</a>
            <a href="?p=content-book" class="item">Friends</a>

            <div class="right menu">
                <div class="item">
                    <a href="?p=cart" class="item">
                        <div class="ui header cart">
                            <i class="big blue add to cart icon"></i>
                        </div>
                    </a>
                </div>

                <div class="item">
                    <a href="view/LoginForm.php" class="ui button" id="button-login">Login</a>
                </div>
                <div class="item">
                    <a class="ui primary button" id="button-login">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</header>