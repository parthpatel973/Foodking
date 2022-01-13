<?php 
unset($_SESSION['user_id']);
unset($_SESSION['username']);
unset($_SESSION['sharetoken']);
header("Location: index.php?p=login");
?>