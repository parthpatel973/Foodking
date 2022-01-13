<?php 
//print_r($_POST);
if(!empty($_POST)  && isset($_POST['contactus'])){
	
    $name = isset($_REQUEST['name'])?$_REQUEST['name']:'';
	$email = isset($_REQUEST['email'])?$_REQUEST['email']:'';
	$subject = isset($_REQUEST['subject'])?$_REQUEST['subject']:'';
	$message = isset($_REQUEST['message'])?$_REQUEST['message']:'';
	
	
	$sql = "insert into contactus(`name`,`email`,`subject`,`desc`)values('".$name."','".$email."','".$subject."','".$message."')";
	echo $sql;//die();
	mysqli_query($conn,$sql);
	$msg = "Name : ".$name.'<br>';
	$msg = "Email : ".$email.'<br>';
	$msg = "Subject : ".$subject.'<br>';
	$msg = "Message : ".$message.'<br>';
	mail(owneremail,'Contact Us',print_r($msg,1));
	header("Location: ?p=feedback&msg=success");
}

?>