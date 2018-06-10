<?php
$username="lakdelpap";
$password="lakshay2;";
session_start();
if(strcmp($username,$_POST["username"])==0 && strcmp($password,$_POST["password"])==0  && $_POST["code"]==$_SESSION["code"]){
	$_SESSION["state"]=1;
	header("location:main.php");
}
else{
	header("location:./");
}
?>