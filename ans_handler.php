<?php

session_start();
require('login_tools.php');

if(!isset($_SESSION['user_id'])){
	load();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(!empty($_POST['answer'])){
		$id = $_POST['id'];
		$ans = $_POST['answer'];
		$temp = "<li class=ans_to_q>";
		require('connect_db.php');
		$ans = mysqli_real_escape_string($dbc,$ans);
		$ans = strip_tags($ans);
		$ans = trim($ans,'"');
		$ans = trim($ans,"'");

		if($ans != ''){

			$q = "select answer from forum where post_id=$id";
			$r = mysqli_query($dbc,$q);
			if($row = mysqli_fetch_array($r,MYSQLI_NUM)) {
				$temp .= "@".$_SESSION['f_name'].$_SESSION['l_name']." ~~ ".$ans."</li>";
				$ans = $temp;
				$ans .= $row[0];
				$q = "update forum set answer='$ans' where post_id=$id";	
				$r = mysqli_query($dbc,$q);
				$q = "update forum set comments=comments+1 where post_id=$id";	
				$r = mysqli_query($dbc,$q);
			}
		}
		mysqli_close($dbc);
		load('ans.php?id='.$id);
	} 
	else {
	load('ans.php?id='.$_POST['id']);
	}
}

?>
