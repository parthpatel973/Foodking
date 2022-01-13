<?php 
if(isset($_REQUEST['token']) && $_REQUEST['token'] != ''){
	$sql ="select * from grouplink where token = '".$_REQUEST['token']."'";
	$rs = mysqli_query($conn,$sql);
	$ordelink = mysqli_fetch_assoc($rs);

	$sql ="select * from category";
	$rs = mysqli_query($conn,$sql);
	if($rs->num_rows > 0){
		while($row = mysqli_fetch_assoc($rs)){
			$datas[] = $row;
		}
		//echo "<pre>";print_r($datas);
	}

	$sql ="select *,p.name as prod_name,p.id as prod_id,c.id as cate_id from product p left join category c on(p.category = c.id)";
	$rs = mysqli_query($conn,$sql);
	if($rs->num_rows > 0){
		while($row = mysqli_fetch_assoc($rs)){
			$products[] = $row;
		}
		//echo "<pre>";print_r($datas);
	}
}

?>