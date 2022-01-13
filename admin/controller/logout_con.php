<?php
unset($_SESSION['admin_user_id']);
session_destroy();
header("Location: index.php?p=adminlogin"); 
?>