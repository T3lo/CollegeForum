<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	require('connect_db.php');
	require('login_tools.php');
	$f_name=$_POST['f_name'];
	$l_name=$_POST['l_name'];
	$email=$_POST['email'];
	$pass1=$_POST['pass1'];

	$q="insert into users(f_name,l_name,email,pass) values ('$f_name','$l_name','$email',SHA1('$pass1'))";
	echo $q;
	$r = mysqli_query($dbc,$q);

	mysqli_close($dbc);
	include('login.php');
}
?>
