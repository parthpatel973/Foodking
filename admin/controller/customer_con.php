<?php
if(!isset($_SESSION['admin_user_id']) or $_SESSION['admin_user_id'] == ''){
	header("Location: index.php?p=adminlogin"); 
}

$sql ="select * from customer ";
$rs = mysqli_query($conn,$sql);
if($rs->num_rows > 0){
	while($row = mysqli_fetch_assoc($rs)){
		$datas[] = $row; 
	}
	//echo "<pre>";print_r($datas);
}
?>