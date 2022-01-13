								<?php
if(!isset($_SESSION['admin_user_id']) or $_SESSION['admin_user_id'] == ''){
	header("Location: index.php?p=adminlogin"); 
}	

//Insert Product
if(!empty($_POST)  && !isset($_POST['editdata'])){
	$uploadfile = $_FILES['image'];
	$file = '';
	if(!empty($uploadfile) && $uploadfile['name'] != ''){
		$imgdir = webpath."image/product/";
		$file = $uploadfile['name'];
		
		if(move_uploaded_file($uploadfile['tmp_name'],$imgdir.$file)){
			echo "successfully";
		}else{
			echo "cant upload";
		}
	}
	//die();
    $name = isset($_REQUEST['name'])?$_REQUEST['name']:'';
	$discription = isset($_REQUEST['discription'])?$_REQUEST['discription']:'';
	$category = isset($_REQUEST['category'])?$_REQUEST['category']:'';
	$price = isset($_REQUEST['price'])?$_REQUEST['price']:'';
	$image = $file;
	$status = isset($_REQUEST['status'])?$_REQUEST['status']:'';
	
	$sql = "insert into product(`name`,`discription`,`category`,`price`,`image`,`status`)values('".$name."','".$discription."','".$category."',".$price.",'".$image."',".$status.")";
	//echo $sql;die();
	mysqli_query($conn,$sql);
	header("Location: ?p=productlisting");
}

//category fetch	
$sql ="select * from category where status = 1";
$rs = mysqli_query($conn,$sql);
if($rs->num_rows > 0){
	while($row = mysqli_fetch_assoc($rs)){
		$category_list[] = $row;
	}
}

//Get product for edit product
$row = array();


if(isset($_GET['id']) && $_GET['id'] != ''){
	$sql ="select * from product where id= ".$_GET['id'];
	$rs = mysqli_query($conn,$sql);
	if($rs->num_rows > 0){
		$row = mysqli_fetch_assoc($rs);
	}
	//print_r($row);
}

if(!empty($_POST) && isset($_POST['editdata'])){
	$uploadfile = $_FILES['image'];
	$file = $_POST['imagevalue'];
	if(!empty($uploadfile) && $uploadfile['name'] != ''){
		$imgdir = webpath."image/product/";
		$file = $uploadfile['name'];
		if(move_uploaded_file($uploadfile['tmp_name'],$imgdir.$file)){
			echo "successfully";
		}else{
			echo "cant upload";
		}
	}
	//die();
    $name = isset($_REQUEST['name'])?$_REQUEST['name']:'';
	$discription = isset($_REQUEST['discription'])?$_REQUEST['discription']:'';
	$category = isset($_REQUEST['category'])?$_REQUEST['category']:'';
	$price = isset($_REQUEST['price'])?$_REQUEST['price']:'';
	$image = $file;
	$status = isset($_REQUEST['status'])?$_REQUEST['status']:'';
	$product_id = isset($_REQUEST['product_id'])?$_REQUEST['product_id']:'';
	
	
	$sql = "update product set `name` = '".$name."',`discription` = '".$discription."',`category` = '".$category."',`price` = '".$price."',`image` = '".$image."',`status` = '".$status."' where id = ".$product_id;
	
	//echo $sql;//die();
	mysqli_query($conn,$sql);
	header("Location: ?p=productlisting");
}

//delete products

if(isset($_GET['id'],$_GET['action']) && $_GET['id'] != '' && $_GET['action'] == 'delete'){
	$sql ="delete from product where id= ".$_GET['id'];
	$rs = mysqli_query($conn,$sql);
	header("Location: ?p=productlisting");
	
	//print_r($row);
}


?>