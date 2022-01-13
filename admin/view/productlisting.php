
<div class="container">
<h1 class="text-center">Product Listing</h1>
<!------ Include the above in your HEAD tag ---------->
	<div><a href="?p=home" class="btn btn-primary">Home</a>
	<a href="?p=product" class="btn btn-primary">Add Product</a></div>
    <div class="p-4">
    <table class="table table-bordered track_tbl">
        <thead>
            <tr>
                <th>S No</th>
                <th>Name</th>
                <th>discription</th>
				<th>category</th>
				<th>price</th>
				<th>image</th>
				<th>status</th>
				<th>action</th>
            </tr>
        </thead>
        <tbody>
		<?php foreach($datas as $data){ ?>
            <tr class="active">
               
                <td><?php echo $data['prod_id']?></td>
                <td><?php echo $data['prod_name']?></td>
				<td><?php echo $data['discription']?></td>
				<td><?php echo $data['name']?></td>
				<td><?php echo $data['price']?></td>
				<td><img width="50px;" src="<?php echo imagepath.$data['image']?>"></td>
                <td><?php echo $data['status'] == 1?'Enable':'Disabled';?></td>
				<td><a class="btn btn-warning" href="?p=product&id=<?php echo $data['prod_id']?>">Edit</a>&nbsp;&nbsp;<a href="?p=product&action=delete&id=<?php echo $data['prod_id']?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger" >Delete</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
</div>