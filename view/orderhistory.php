<div class="container">
    <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="gallery-title">Order history</h1>
        </div>
        <table class="table table-bordered track_tbl">
        <thead>
            <tr>
                <th>Order Id</th>
                <th>Name</th>
                <th>Phone Number</th>
				<th>Payment Method</th>
				
				<th>Total</th>
				<th>Date</th>
				<th>Status</th>
				<th>action</th>
            </tr>
        </thead>
        <tbody>
		<?php foreach($orderlist as $data){ ?>
            <tr class="active">
               
                <td><?php echo $data['id']?></td>
                <td><?php echo $data['first_name']?></td>
				<td><?php echo $data['phone_number']?></td>
				<td><?php echo $data['paymentmethod']?></td>
				
				<td><?php echo $data['totalamount']?></td>
				<td><?php echo $data['dateadded']?></td>
				<td><?php echo $data['orderstatus']?></td>
				
				<td><a target="_blank" class="btn btn-warning" href="?p=invoiceview&id=<?php echo $data['id']?>">View</a>&nbsp;&nbsp;</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
</div>
