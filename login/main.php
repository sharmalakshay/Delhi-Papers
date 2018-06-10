<?php
session_start();
if($_SESSION["state"]==0){
	header("location:./");
}
echo '
<a href="logout.php">Logout</a>
';
?> 