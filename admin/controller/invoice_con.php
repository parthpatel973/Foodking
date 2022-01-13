<?php
if(!isset($_SESSION['admin_user_id']) or $_SESSION['admin_user_id'] == ''){
	header("Location: index.php?p=adminlogin"); 
}


$sqlorder = "SELECT * from `order` order by id desc";
$order_rs = mysqli_query($conn,$sqlorder);
while($order_res = mysqli_fetch_assoc($order_rs)){
	$orderlist[] = $order_res;
}

if(isset($_GET['id'],$_GET['action']) && $_GET['id'] != '' && $_GET['action'] == 'updatestatus'){
	$sql ="update  `order` set orderstatus= '".$_GET['status']."' where id= ".$_GET['id'];
	//echo $sql;
	$rs = mysqli_query($conn,$sql);
	header("Location: ?p=invoice&msg=successfully update status");
	
	//print_r($row);
}

?>