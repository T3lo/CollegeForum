<?php

session_start();
if(!isset($_SESSION['user_id'])) {
	require('login_tools.php');
	load();
}

require('connect_db.php');

$q = "SELECT * FROM forum order by post_date desc";
$r = mysqli_query($dbc,$q);

echo '<div id="main">';
include('post.php');

if(mysqli_num_rows($r) > 0) {

	while( $row = mysqli_fetch_array($r,MYSQLI_ASSOC)) {
		echo '
<style>
body {
	background-color:#cbc7c7;
}
</style>
		<div class="block">
			<div class="upper">
				<div class="usr_name">~'.$row['f_name'].$row['l_name'].'</div>
				<div class="date">'.$row['post_date'].'</div>
			</div>
			<div class="question">'.$row['question'].'</div>
			<div class="lower">
				<div class="btn ans"><a style="color: white ;text-decoration: none" href="./ans.php?id='.$row["post_id"].'">Answer</a></div>
<div class="info">'.$row['comments'].' Answers   '.$row['likes'].'<a href=like.php?id='.$row["post_id"].'>Likes</a></div>
			</div>
		</div>';
	}	
}
else {
	echo "<p>No msgs currently</p>";
}

echo '</div>';
?>
