<?php
	session_start();	
	$error='';
	if(isset($_POST['submit'])){
		if(empty($_POST['username']) || empty($_POST['password'])){
			$error = "Username atau Password salah woi";
		}
		else
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
					// Membangun koneksi ke database
			$connection = mysql_connect("localhost", "root", "") or die("gak isok konek");
			// Mencegah MySQL injection 

			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			$db = mysql_select_db("perpustakaan", $connection);
			// SQL query untuk memeriksa apakah karyawan terdapat di database?
			$query = mysql_query("select * from user where password_user='$password' AND username_user='$username'", $connection);
			$rows = mysql_num_rows($query);
				if ($rows == 1) {
					$_SESSION['login_user']=$username; // Membuat Sesi/session
					setcookie("Main", $username);
					header("Location: loginpro.php"); // Mengarahkan ke halaman profil
					} else {
					$error = "Username atau Password belum terdaftar";
					}
			mysql_close($connection); // Menutup koneksi
		}
	}
?>