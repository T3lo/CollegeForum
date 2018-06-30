<?php
session_start();
$page_title='Answer';
include('header.php');

if(!isset($_SESSION['user_id'])) {
	require('login_tools.php');
	load();
}
else{
	require('connect_db.php');
	$id = $_GET['id'];
	$q = "select question,answer from forum where post_id=$id";
	$r = mysqli_query($dbc,$q);

	if($row = mysqli_fetch_array($r,MYSQLI_ASSOC)){
		echo '
<style>
body {
	background-color:#cbc7c7;
}
</style>
			  <div id="main">
				<div id="_q_"><i>'.$row['question'].'</i></div>			
				<form method="POST" action="ans_handler.php">
					<input type="text" row="5" col="100" name="answer" style="background-color:inherit"></textarea>
					<input type="hidden" name="id" value='.$id.'>
					<input type="submit" value="Answer" class="btn">
				</form>
				<ul>'.$row['answer'].'</ul>
			</div>';
	}

}

?>
