<?php
if(!isset($_SESSION['admin_user_id']) or $_SESSION['admin_user_id'] == ''){
	header("Location: index.php?p=adminlogin"); 
}
	if(!empty($_POST)){
		$name = isset($_REQUEST['name'])?$_REQUEST['name']:'';
		$status = isset($_REQUEST['status'])?$_REQUEST['status']:'';
		$sql = "insert into category(`name`,`status`)values('".$name."',".$status.")";
		//echo $sql;//die();
		mysqli_query($conn,$sql);
		header("Location: ?p=categorylisting"); 
	}
//Get product for edit product
$row = array();
if(isset($_GET['id']) && $_GET['id'] != ''){
	$sql ="select * from category where id= ".$_GET['id'];
	$rs = mysqli_query($conn,$sql);
	if($rs->num_rows > 0){
		$row = mysqli_fetch_assoc($rs);
	}
	//print_r($row);
}
	if(!empty($_POST) && isset($_POST['editdata'])){
	
	//die();
    $name = isset($_REQUEST['name'])?$_REQUEST['name']:'';
	$status = isset($_REQUEST['status'])?$_REQUEST['status']:'';
	$category_id = isset($_REQUEST['category_id'])?$_REQUEST['category_id']:'';
	
	
	$sql = "update category set `name` = '".$name."',`status` = '".$status."' where id = ".$category_id;
	
	//echo $sql;//die();
	mysqli_query($conn,$sql);
	header("Location: ?p=categorylisting");
}
	
	
?>