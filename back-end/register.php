<?php

include 'config.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($mysqli," select * from users where username='$username' ");
$cek = mysqli_num_rows($login);

if($cek == 0){
	$register = mysqli_query($mysqli," INSERT INTO users (username, password) VALUES ('$username', '$password') ");
	$cekr = mysqli_num_rows($register);
	header("location:../front-end/login.html");
}else{
	header("location:../front-end/register.html");	
}

?>