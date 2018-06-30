<?php
session_start();
require('login_tools.php');
if(!isset($_SESSION['user_id'])) {
	require('login_tools.php');
	load();
}

require('connect_db.php');
$question=$_GET['question'];
$f_name=$_SESSION['f_name'];
$l_name=$_SESSION['l_name'];

//add it to the forum database
$q="insert into 
forum (f_name,l_name,post_date,question,comments,likes) 
values 
('$f_name','$l_name',NOW(),'$question',0,0)
";
$r = mysqli_query($dbc,$q);
load('index.php');
mysqli_close($dbc);
?>
