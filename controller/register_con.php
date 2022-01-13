<?php 
if(!empty($_POST) && $_POST['registerform'] == 1){
	//print_r($_REQUEST);die();
	
		if(checkuser($_REQUEST)){
			$username = isset($_REQUEST['username'])?$_REQUEST['username']:'';
			$fullname	 = isset($_REQUEST['fullname'])?$_REQUEST['fullname']:'';
			$email = isset($_REQUEST['email'])?$_REQUEST['email']:'';
			$address = isset($_REQUEST['address'])?$_REQUEST['address']:'';
			$password = isset($_REQUEST['password'])?$_REQUEST['password']:'';
			$state = isset($_REQUEST['state'])?$_REQUEST['state']:'';
			$city = isset($_REQUEST['city'])?$_REQUEST['city']:'';
			$postalcode = isset($_REQUEST['postalcode'])?$_REQUEST['postalcode']:'';
			
			$sql = "insert into customer(`fullname`,`email`,`address`,`state`,`city`,`postalcode`,`password`)values('".$fullname."','".$email."','".$address."','".$state."','".$city."','".$postalcode."','".$password."')";
			//echo $sql;die();
			mysqli_query($conn,$sql);
			header("Location: index.php?p=myaccount"); 
		}else{
			header("Location: index.php?p=register&msg=already exists");
		}
	}
function checkuser($data){
	global $conn;
	$sql ="select * from customer where email = '".$_REQUEST['email']."'";
	//echo $sql;die();
	$rs = mysqli_query($conn,$sql);

	if($rs->num_rows > 0){
		return false;
	}
	return true;
}
?>