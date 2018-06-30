<?php
session_start();
$page_title='The_College_Forum';

if(isset($_SESSION['user_id'])) {
	$page_title = 'Home';
	include('header.php');
	include('forum.php');
}
else {
	include('login.php');
	
}
?>
