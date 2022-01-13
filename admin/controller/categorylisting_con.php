<?php

if(!isset($_SESSION['admin_user_id']) or $_SESSION['admin_user_id'] == ''){
	header("Location: index.php?p=adminlogin"); 
}

$sql ="select * from category";
$rs = mysqli_query($conn,$sql);
if($rs->num_rows > 0){
	while($row = mysqli_fetch_assoc($rs)){
		$datas[] = $row;
	}
	//echo "<pre>";print_r($datas);
}
if(isset($_GET['id'],$_GET['action']) && $_GET['id'] != '' && $_GET['action'] == 'delete'){
	$sql ="delete from category where id= ".$_GET['id'];
	$rs = mysqli_query($conn,$sql);
	header("Location: ?p=categorylisting");
	
	//print_r($row);
}
//print_r($_REQUEST);
?>