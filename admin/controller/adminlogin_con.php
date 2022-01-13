<?php
//print_r($_REQUEST);
if(isset($_SESSION['admin_user_id']) and $_SESSION['admin_user_id'] != ''){
	header("Location: dashboard.php?p=home"); 
}
if(!empty($_POST)){
	$admin_user_id = isset($_REQUEST['admin_user_id'])?$_REQUEST['admin_user_id']:'';
	$password = isset($_REQUEST['password'])?$_REQUEST['password']:'';


	/*$aql = "insert into user('username','password','status')values('".$admin_user_id."','".$password."',1)";*/

	$sql = "select * from user where username='".$admin_user_id."' and password = '".$password."'";
	//echo $sql;
	 $res = mysqli_query($conn,$sql);

	if($res->num_rows > 0){
		$rs = mysqli_fetch_assoc($res);
		$_SESSION['admin_user_id'] = $rs['username'];
		header("Location: dashboard.php?p=home"); 
	}else{
		$error =  "Please Check Your Username Password";
	}
}


?>