<?php 
function load($page='login.php') {
	$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
	$url .= '/'.$page;
	header("location: $url");
}
function validate($dbc,$email ="", $pwd= "") {
	$errors = array();
	if(empty($email)) {
		$errors[] = "Enter your email";
	}
	else {
		$e = mysqli_real_escape_string($dbc,trim($email));
	}
	if(empty($pwd)) {
		$errors[] = "Enter Password";
	}
	else {
		$p = mysqli_real_escape_string($dbc,trim($pwd));
	}
	if(empty($errors)) {
		$q = "SELECT user_id,f_name,l_name FROM users WHERE email='$e' AND pass=SHA1('$p')";
		$r = mysqli_query($dbc,$q);
		if(mysqli_num_rows($r) == 1) {
			$row = mysqli_fetch_array($r,MYSQLI_ASSOC);
			return array(true,$row);
		}
		else {
			$errors[] = "Email & Pwd not found";
		}
	}
	
	return array(false,$errors);
}
?>
