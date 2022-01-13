
<div class="container">
<h1 class="text-center">Customer Listing</h1>
<!------ Include the above in your HEAD tag ---------->
	<div><a href="?p=home" class="btn btn-primary">Home</a>
    <div class="p-4">
    <table class="table table-bordered track_tbl">
        <thead>
            <tr>
                <th>S No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
		<?php foreach($datas as $data){ ?>
            <tr class="active">
               <td><?php echo $data['id']?></td>
                <td><?php echo $data['fullname']?></td>
                <td><?php echo $data['email']?></td>
				<td><?php echo $data['address']?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
</div>