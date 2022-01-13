<?php

if(!isset($_SESSION['admin_user_id']) or $_SESSION['admin_user_id'] == ''){
	header("Location: index.php?p=adminlogin"); 
}
?>