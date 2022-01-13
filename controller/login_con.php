<?php 
if(isset($_SESSION['user_id']) and $_SESSION['user_id'] != ''){
	header("Location: index.php?p=myaccount"); 
}
if(!empty($_POST) && $_POST['loginform'] == 1){
	//print_r($_REQUEST);die();
	
		if($data = checkuser($_REQUEST)){
			$_SESSION['user_id'] = $data['id'];
			$_SESSION['username'] = $data['username'];
			if(isset($_REQUEST['back']) && $_GET['back'] !=''){
				header("Location: index.php?p=".$_GET['back']);
				die();
			}
			header("Location: index.php?p=myaccount"); 
		}else{
			header("Location: index.php?p=login&msg=invalid username password");
		}
	}
function checkuser($data){
	global $conn;
	$sql ="select * from customer where email = '".$_REQUEST['email']."' and password = '".$_REQUEST['password']."'";
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