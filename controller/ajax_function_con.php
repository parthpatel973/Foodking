<?php 
$act = trim($_REQUEST['act']);
//echo $act;die();
if(isset($act) && $act == 'addtocart'){
	$pid = $_REQUEST['pid'];
	if(isset($_SESSION['cartproduct'][$pid])){
		$_SESSION['cartproduct'][$pid]['qty'] = $_SESSION['cartproduct'][$pid]['qty']+1;
		return true;
	}
	$qty = isset($_REQUEST['qty'])?$_REQUEST['qty']:1;
	$_SESSION['cartproduct'][$pid]['id'] = $pid;
	$_SESSION['cartproduct'][$pid]['qty'] = $qty;
	return true;
	die();
}
if(isset($act) && $act == 'remove'){
	$pid = $_REQUEST['pid'];
	unset($_SESSION['cartproduct'][$pid]);
	return true;
	die();
}
if(isset($act) && $act == 'updateqty'){
 	$qty = $_REQUEST['qty'];
 	$pid = $_REQUEST['pid'];
 	if($qty > 0){
 		$_SESSION['cartproduct'][$pid]['qty'] = $qty;
 	}else{
 		unset($_SESSION['cartproduct'][$pid]);
 	}
	
	return true;
	die();
}
if(isset($_REQUEST['act']) && $_REQUEST['act'] == 'adddishemployee'){
	$item_id = $_REQUEST['productid'];
	$employename = $_REQUEST['employename'];
	$token = $_REQUEST['token'];		
	mysqli_query($conn,"insert into `group_dish` (`token`,`name`,`dish_id`) values('".$token."','".$employename."','".$item_id."')");		
	return true;	
	die();
			
}

if(isset($_REQUEST['act']) &&  $_REQUEST['act'] == 'singleremovedish'){
		$key = $_REQUEST['id'];
		//unset($_SESSION['cartproduct'][$key]);
		mysqli_query($conn,"delete from `group_dish` where group_dish_id='".$key."'");
		echo "1";
		die();
	}

?>