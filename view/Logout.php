<?php
   session_start();
   if(session_destroy()){
   	header("Location: ../index.php");
   	setcookie("Main", "", time() - 3600);
   }
?>