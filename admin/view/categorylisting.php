
<div class="container">
<h1 class="text-center">Category Listing</h1>

<!------ Include the above in your HEAD tag ---------->
    <div><a href="?p=home" class="btn btn-primary">Home</a>
	<a href="?p=category" class="btn btn-primary">Add Category</a></div>
    <div class="p-4">
    <table class="table table-bordered track_tbl">
        <thead>
            <tr>
                <th>S No</th>
                <th>Name</th>
                <th>status</th>
				<th>Action</th>
            </tr>
        </thead>
        <tbody>
		<?php foreach($datas as $data){ ?>
            <tr class="active">
               
                <td><?php echo $data['id']?></td>
                <td><?php echo $data['name']?></td>
                <td><?php echo $data['status'] == 1?'Enable':'Disabled';?></td>
				<td><a class="btn btn-warning" href="?p=category&id=<?php echo $data['id']?>">Edit</a>&nbsp;&nbsp;<a href="?p=categorylisting&action=delete&id=<?php echo $data['id']?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger" >Delete</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
</div>