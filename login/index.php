<?php
session_start();
if($_SESSION['state']=='1'){
	header("location:main.php");
}
?>
<html>
<head>
<title>Delhi Papers - Login</title>
<link rel="stylesheet" type="text/css" href="../mystyle.css">
<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
</head>
<div align="center">
<a href="../" class="headerstyle">
DELHI <p class=paper>&nbspPAPERS&nbsp</p>
</a>
</div>
<form id="lf" action="check.php" method="post">
Username:
<br>
<input type="text" name="username">
<br>
Password:
<br>
<input type="password" name="password">
<br>
Captcha:
<br>
<input type="text" name="code">
<br>
<img src="captcha.php"/>
<br><br>
<input type="submit">
</form>