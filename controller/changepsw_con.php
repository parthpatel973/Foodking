<?php 

$sql ="select * from customer where id = '".$_SESSION['user_id']."' ";
$rs = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($rs);


if(!empty($_POST) && $_POST['registerform'] == 1){
	//print_r($_REQUEST);die();
	
			
			if(checkuser11($_REQUEST)){
				//$oldpassword	 = isset($_REQUEST['oldpassword'])?$_REQUEST['oldpassword']:'';
				$password = isset($_REQUEST['password'])?$_REQUEST['password']:'';
				//echo $password;die();
				$sql = "update customer set password = '".$password."' where id=".$_SESSION['user_id'];
				mysqli_query($conn,$sql);
				header("Location: index.php?p=myaccount&success=Successfully Update"); 
			}else{
				header("Location: index.php?p=changepsw&msg=wrong password");
			}
	}
function checkuser11($data){
	global $conn;
	$sql ="select * from customer where `password` = '".$_REQUEST['oldpassword']."'";
	//echo $sql;die();
	$rs = mysqli_query($conn,$sql);
	//echo $rs->num_rows;die();
	if($rs->num_rows > 0){
		return true;
	}
	return false;
}
?>