<?php 

if(!empty($_POST) && $_POST['resetpassword'] == 1){
	//print_r($_REQUEST);die();
	
		if($data = checkuser($_REQUEST)){
			$newpassword = rand();
			$sql ="update customer set password = '".$newpassword."' where id = '".$data['id']."' ";
			
			$rs = mysqli_query($conn,$sql);
			$msg = 'Hello '.$data['fullname'];
			$msg .= 'Your New Password : '.$newpassword;
			mail($data['email'],'Reset Password',print_r($msg,1));

			header("Location: index.php?p=login"); 
		}else{
			header("Location: index.php?p=resetpassword&msg=invalid email");
		}
	}
function checkuser($data){
	global $conn;
	$sql ="select * from customer where email = '".$_REQUEST['email']."' ";
	//echo $sql;die();
	$rs = mysqli_query($conn,$sql);

	if($rs->num_rows > 0){
		$row = mysqli_fetch_assoc($rs);
//print_r($row);die();
		return $row;	
	}else{
		return false;
	}
	
}
?>