<?php 
$sqlorder = "SELECT * from `order` WHERE id =".$_GET['id']." and user_id = ".$_SESSION['user_id'];
$order_rs = mysqli_query($conn,$sqlorder);
$order_res = mysqli_fetch_assoc($order_rs);
if(!empty($order_res)){
	$view = Recipts($order_res['id']);
}

   ?>