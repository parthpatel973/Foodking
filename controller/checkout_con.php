<?php 
if(!isset($_SESSION['user_id']) or $_SESSION['user_id'] == ''){
	header("Location: index.php?p=login&back=checkout"); 
}
$sql ="select * from customer where id = '".$_SESSION['user_id']."' ";
$rs = mysqli_query($conn,$sql);
$crow = mysqli_fetch_assoc($rs);
$udatav = explode(' ', $crow['fullname']);

$firstname = (isset($udatav[0])?$udatav[0]:'');
$lastname = (isset($udatav[1])?$udatav[1]:'');
//echo $firstname;
//print_r($row);(

if(isset($_REQUEST['glink']) && $_REQUEST['glink'] == 1){
	$token = md5(rand());
	$_SESSION['sharetoken'] = $token;
	$sql = "insert into grouplink (`user_id`,`token`,`ownername`,`date`,`status`)values('".$_SESSION['user_id']."','".$token."','".$_SESSION['username']."',NOW(),1)";
	mysqli_query($conn,$sql);
	header("Location: index.php?p=checkout"); 
}
if(isset($_SESSION['sharetoken']) && $_SESSION['sharetoken'] != ''){
	$sharelink = website."index.php?p=menushow&token=".$_SESSION['sharetoken'];
}
/*$cartlist = array();
if(!empty($_SESSION['cartproduct'])){
	foreach($_SESSION['cartproduct'] as $key=>$pid){
		$sql ="select * from product where id= ".$key;
		
		$rs = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($rs);
		$cartlist[] = $row;
	}
 
}*/
function getproduct($id,$conn){
	//echo $id.'<br>';
	global $conn;
	$sql ="select * from product where id= ".$id;
	//echo $sql;
	$rs = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($rs);
	return $row;
}

	$cart = (!empty($_SESSION['cartproduct'])?$_SESSION['cartproduct']:array());
	//print_r($cart);
			$cartid = 0;
			$subtotal = 0;
			if(!empty($cart)){
				foreach($cart as $key=>$ids){
					//print_r($ids);
					//$cartid += $ids;
					//print_r($objProducts);die();
					$pid = $ids['id'];
					$product = getproduct($ids['id'],$conn);	
					$cartlist[$pid]['name'] = $product['name'];
					$cartlist[$pid]['product_id'] = $product['id'];
					$cartlist[$pid]['price'] = $product['price'];
					$cartlist[$pid]['image'] = $product['image'];
					$cartlist[$pid]['qty'] = $ids['qty'];
					$cartlist[$pid]['amount'] = number_format($product['price']*$ids['qty'],2);
					$subtotal += $cartlist[$pid]['amount'];
				}
			}
			//echo "<pre>";print_r($cartlist);die();
			//echo $subtotal;
			/*share dish code*/
			$emp_cartid = 0;
			$emp_cartlist = array();
			if(isset($_SESSION['sharetoken']) && $_SESSION['sharetoken'] != ''){
			$vpb_dish = mysqli_query($conn,"select * from `group_dish` where `token` = '".$_SESSION['sharetoken']."'");
				while($deliv_dish = mysqli_fetch_assoc($vpb_dish)){
					$emp_cartid += 1;
					$key = '';
					//print_r($deliv_dish);//die();
					$product = getproduct($deliv_dish['dish_id'],$conn);	
					//print_r($product);die();
					$key = $deliv_dish['group_dish_id'].'-'.$deliv_dish['dish_id'];
					$emp_cartlist[$key]['group_dish_id'] = $deliv_dish['group_dish_id'];
					$emp_cartlist[$key]['name'] = $product['name'];
					$emp_cartlist[$key]['empname'] = $deliv_dish['name'];
					$emp_cartlist[$key]['product_id'] = $product['id'];
					$emp_cartlist[$key]['price'] = $product['price'];
					$emp_cartlist[$key]['image'] = $product['image'];
					$emp_cartlist[$key]['qty'] = 1;
					$emp_cartlist[$key]['amount'] = number_format($product['price']*1,2);
					$subtotal += $emp_cartlist[$key]['amount'];
				}
			}
			$sgst = ($subtotal*(GST/2)/100);
			$cgst = ($subtotal*(GST/2)/100);
			$totalamount = ($subtotal+($subtotal*(GST)/100)+DELIVERYCHARGE);
			//echo "<pre>";print_r($emp_cartlist);
$token = isset($_SESSION['sharetoken'])?$_SESSION['sharetoken']:'';
if(isset($_POST['paymentpost']) && $_POST['paymentpost'] == 1 && (!empty($cart) or !empty($emp_cartlist))){
	//print_r($_POST);die();
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip_code = $_POST['zip_code'];
	$phone_number = $_POST['phone_number'];
	$email_address = $_POST['email_address'];
	$paymentmethod = $_POST['paymentmethod'];
	$totalamount = $totalamount;
	$sgst = $sgst;
	$cgst = $cgst;
	$deliverycharge = DELIVERYCHARGE;
	$user_id = $_SESSION['user_id'];
	$sql = "insert into `order` (`first_name`,`last_name`,`address`,`city`,`state`,`zip_code`,`phone_number`,`email_address`,`paymentmethod`,`orderstatus`,`dateadded`,`totalamount`,`sgst`,`cgst`,`deliverycharge`,`user_id`,`subtotal`)values('".$first_name."','".$last_name."','".$address."','".$city."','".$state."','".$zip_code."','".$phone_number."','".$email_address."','".$paymentmethod."','processing',NOW(),'".$totalamount."','".$sgst."','".$cgst."','".$deliverycharge."','".$user_id."','".$subtotal."')";
	//echo $sql;
	mysqli_query($conn,$sql)or die("Your query is not Working for table Orders");
	//mysqli_query($conn,$sql);
	$order_id = mysqli_insert_id($conn);
	//echo $order_id;die();
	if(!empty($cart)){
			foreach($cart as $key=>$ids){
				$pid = $ids['id'];
				$product = getproduct($ids['id'],$conn);
				$tot_price = number_format($product['price']*$ids['qty'],2);
				$sql="INSERT INTO order_product (`order_id`,`product_id`,`name`,`quantity`,`price`,`total`) VALUES ('".$order_id."','".$product['id']."','".$product['name']."','".$ids['qty']."','".$product['price']."','".$tot_price."')";
				mysqli_query($conn,$sql)or die("Your query is not Working for table Order Product");
			}
		}
	if(!empty($emp_cartlist)){
			$vpb_da = mysqli_query($conn,"select * from `group_dish` where `token` = '".($token)."'");			
			while($vpb_res = mysqli_fetch_assoc($vpb_da)){
				$product = getproduct($vpb_res['dish_id'],$conn);	
				$tot_price = number_format($product['price']*1,2);
				$sql="INSERT INTO order_product (`order_id`,`group_dish_id`,`product_id`,`name`,`quantity`,`price`,`total`) VALUES ('".$order_id."','".$vpb_res['group_dish_id']."','".$product['id']."','".$product['name']."',1,'".$product['price']."','".$tot_price."')";
				mysqli_query($conn,$sql)or die("Your query is not Working for table Order Product");
			}
		}

		if(isset($_REQUEST['paymentmethod']) && $_REQUEST['paymentmethod'] == 'cashondelivery'){
			 sendEmailRecipts($order_id,$conn);
			  unset($_SESSION['sharetoken']);
			 unset($_SESSION['cartproduct']);
			?>
				<script type="text/javascript">
			<!--
				window.location="?p=success&id=<?php echo $order_id; ?>";
			//-->
			</script>
			<?php
		}
		/*function codpayment($order_id){
			sendEmailRecipts($order_id,'CashonDelivery');
		}*/



}




?>