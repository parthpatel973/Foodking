<?php 
if(!isset($_SESSION['user_id']) or $_SESSION['user_id'] == ''){
	header("Location: index.php?p=login"); 
}
$sql ="select * from customer where id = '".$_SESSION['user_id']."' ";
$rs = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($rs);
//print_r($row);
?>