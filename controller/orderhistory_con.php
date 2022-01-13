<?php 
if(!isset($_SESSION['user_id']) or $_SESSION['user_id'] == ''){
	header("Location: index.php?p=login"); 
}

$sqlorder = "SELECT * from `order` WHERE user_id = ".$_SESSION['user_id']." order by id desc";
$order_rs = mysqli_query($conn,$sqlorder);
while($order_res = mysqli_fetch_assoc($order_rs)){
	$orderlist[] = $order_res;
}

?>