<?php
include('config/db.php');
// Memulai Session
// Menyimpan Session
$user_check=$_SESSION['login_user_admin'];
// Ambil nama karyawan berdasarkan username karyawan dengan mysql_fetch_assoc
$ses_sql=mysql_query("select username_petugas from petugas where username_petugas='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username_petugas'];
if(!isset($login_session)){
	mysql_close($connection); // Menutup koneksi
	header('Location: view/LoginForm.php'); // Mengarahkan ke Home Page
}
?>