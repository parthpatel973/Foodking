<?php

if(!isset($_SESSION['admin_user_id']) or $_SESSION['admin_user_id'] == ''){
	header("Location: index.php?p=adminlogin"); 
}

$sql ="select *,p.name as prod_name,p.id as prod_id,c.id as cate_id from product p left join category c on(p.category = c.id)";
$rs = mysqli_query($conn,$sql);
if($rs->num_rows > 0){
	while($row = mysqli_fetch_assoc($rs)){
		$datas[] = $row; 
	}
	//echo "<pre>";print_r($datas);
}
//print_r($_REQUEST);
?>