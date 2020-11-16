<?php

include 'config.php';
session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($mysqli," select * from users where username='$username' and password='$password' ");
$cek = mysqli_num_rows($login);

$waktu_login = date('Y-m-d H:i:s');

if($_POST['login']){
	if($cek > 0){
		
		mysqli_query($mysqli," UPDATE users SET status='login',waktu_login='$waktu_login' WHERE username='$username' ");

		$_SESSION['username'] = $username;
		$_SESSION['status'] = "login";
		$_SESSION['session_id'] = session_id();
		
		$cookie_name = "username";
		$cookie_value = $username;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

		header("location:../front-end/home.html");
	}else{
		header("location:../front-end/login.html");	
	}
} else {
	header("location:../front-end/register.html");	
}


?>