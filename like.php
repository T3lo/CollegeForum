<?php
include('login_tools.php');
include('connect_db.php');

$id=$_GET['id'];
$q="update forum set likes=likes+1 where post_id=$id";
$r=mysqli_query($dbc,$q);

mysqli_close($dbc);
?>
