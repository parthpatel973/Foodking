
<script>
function remove(id){
	var pid = id;
	$.ajax({  
         type:"POST",  
         url:"index.php?p=ajax_function&act=remove",  
         data:"pid="+pid,  
         complete:function(data){  
            location = "index.php?p=cartlist";
         }  
      });  
}
function updateqty(id,qty){
    var pid = id;
    var qty = qty;
    $.ajax({  
         type:"POST",  
         url:"index.php?p=ajax_function&act=updateqty",  
         data:"pid="+pid+"&qty="+qty,  
         complete:function(data){  
            location = "index.php?p=cartlist";
         }  
      });
}  
</script>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
				<?php $subtotal = 0; foreach($cartlist as $cartli){ 
                    $subtotal += ($cartli['price']*$_SESSION['cartproduct'][$cartli['id']]['qty']);
                    ?>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="<?php echo imagepath.$cartli['image']?>" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"><?php echo $cartli['name'];?></a></h4>
                                <h5 class="media-heading"><a href="#"><?php echo $cartli['discription'];?></a></h5>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="qty" class="form-control" id="exampleInputEmail1" value="<?php echo $_SESSION['cartproduct'][$cartli['id']]['qty'];?>" OnChange="updateqty(<?php echo $cartli['id']?>,this.value);">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo curr.$cartli['price'];?></strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo curr.($cartli['price']*$_SESSION['cartproduct'][$cartli['id']]['qty']);?></strong></td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" onclick="remove(<?php echo $cartli['id']?>);" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>SubTotal</h5></td>
                        <td class="text-right"><h5><strong><?php echo curr.$subtotal; ?></strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Delivery Charge</h5></td>
                        <td class="text-right"><h5><strong><?php echo curr.DELIVERYCHARGE;?></strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>CGST</h5></td>
                        <td class="text-right"><h5><strong><?php echo curr.$subtotal*(GST/2)/100;?></strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>SGST</h5></td>
                        <td class="text-right"><h5><strong><?php echo curr.$subtotal*(GST/2)/100;?></strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong><?php echo curr.($subtotal+($subtotal*(GST)/100)+DELIVERYCHARGE);?></strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default"><a href="?p=menu"/>
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </a></button></td>
                        <td>
                        <a href="?p=checkout"/><button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>