<?php

include 'config.php';

session_start();

if(isset($_SESSION['session_id'])) {
	// echo $_SESSION['session_id'];
	if($_SESSION['session_id']==session_id()){

		if(!isset($_COOKIE['username'])) {
			echo '';
		} else {
			if(isset($_COOKIE['username'])){
				$username = $_COOKIE['username'];
				$login = mysqli_query($mysqli," select * from users where username='$username' ");
				$array = mysqli_fetch_array($login);
				
				echo json_encode(array('username' =>$array['username'], 'waktu_login' => $array['waktu_login'],'status' =>$array['status'] ));
			} else echo '';
		}

	} else echo '';
} else echo '';
?>