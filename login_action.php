<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	require('connect_db.php');
	require('login_tools.php');
	list($check,$data) = validate($dbc,$_POST['email'],$_POST['pass']);
	
	if($check) {
		session_start();
		$_SESSION['user_id'] = $data['user_id'];
		$_SESSION['f_name'] = $data['f_name'];
		$_SESSION['l_name'] = $data['l_name'];
		
		load('index.php');
	}
	else{
		$errors = $data;
	}
	mysqli_close($dbc);
	include('login.php');
}
?>
