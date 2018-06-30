<?php
$page_title='Sign_up';
include('header.php');
?>
<style>
	body {
background-color: #5e79d7;
}
</style>
<div id="main" style='font-size:35px;text-align:center;margin-top:20px;'>
<h1>Register</h1>
<fieldset style="background-color:white;">
	<form action="sign_up.php" method="POST">
		<p>First Name:<input type="text" name="f_name" value="<?php if(isset($_POST['f_name'])) echo $_POST['f_name'];?>" style='background-color:inherit'></p>
		<p>Last Name:<input type="text" name="l_name" value="<?php if(isset($_POST['l_name'])) echo $_POST['l_name'];?>" style='background-color:inherit'></p>
		<p>email:<input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" style='background-color:inherit'></p>
		<p>pass1 :<input type="password" name="pass1" value="<?php if(isset($_POST['pass1'])) echo $_POST['pass1'];?>" style='background-color:inherit'></p>
		<p>pass2 :<input type="password" name="pass2" value="<?php if(isset($_POST['pass2'])) echo $_POST['pass2'];?>" style='background-color:inherit'></p>
		<p style='margin-top:20px;margin-bottom:20px;' ><input type="submit" class='btn'></p>
	</form>
</fieldset>
</div>
