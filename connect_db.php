<?php
	$dbc = mysqli_connect('localhost','ritwik','ritwik','site_db')
	OR die ( mysql_connect_error() );
	
	mysqli_set_charset($dbc,'utf8');
?>
