<?php 

$sql ="select * from customer where id = '".$_SESSION['user_id']."' ";
$rs = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($rs);
//print_r($row);

if(!empty($_POST) && $_POST['registerform'] == 1){
	//print_r($_REQUEST);die();
		//print_r($_FILES);die();
		$uploadfile = $_FILES['profilenew'];
		$file = isset($_REQUEST['oldprofile'])?$_REQUEST['oldprofile']:'';
		if(!empty($uploadfile) && $uploadfile['name'] != ''){
		$imgdir = webpath."image/profile/";
		$file = $uploadfile['name'];
		
		if(move_uploaded_file($uploadfile['tmp_name'],$imgdir.$file)){
			echo "successfully";
		}else{
			echo "cant upload";
		}
	}
		$fullname	 = isset($_REQUEST['fullname'])?$_REQUEST['fullname']:'';
		$email = isset($_REQUEST['email'])?$_REQUEST['email']:'';
		$address = isset($_REQUEST['address'])?$_REQUEST['address']:'';
		$sql = "update customer set fullname = '".$fullname."',email = '".$email."',address = '".$address."',image = '".$file."' where id=".$_SESSION['user_id'];

			mysqli_query($conn,$sql);
			header("Location: index.php?p=myaccount"); 
	}
function checkuser($data){
	global $conn;
	$sql ="select * from customer where username = '".$_REQUEST['username']."' or email = '".$_REQUEST['email']."'";
	//echo $sql;die();
	$rs = mysqli_query($conn,$sql);

	if($rs->num_rows > 0){
		return false;
	}
	return true;
}
?>