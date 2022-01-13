<?php 
//print_r($_SESSION['cartproduct']);
if(!empty($_SESSION['cartproduct'])){
	foreach($_SESSION['cartproduct'] as $key=>$pid){
		$sql ="select * from product where id= ".$key;
		
		$rs = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($rs);
		$cartlist[] = $row;
	}
 
}else{
	header("Location: index.php?p=menu");
}


?>