<div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <div style="display: table; margin: auto;">
                        <span class="step step_complete"> <a href="#" class="check-bc"></a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                        <span class="step step_complete"> <a href="#" class="check-bc"></a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
                        <span class="step_thankyou check-bc step_complete"></span>
                    </div>
                </div>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            <div class="row cart-body">
                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 ">
                <div class="panel panel-info">
                        <div class="panel-heading">
                            Share Order <div class="pull-right"><small>
                                <?php if(isset($sharelink) && $sharelink  != ''){?>
                                    <a class="afix-1" href="<?php echo $sharelink; ?>"><?php echo $sharelink; ?></a>
                                <?php }else{ ?>
                                    <a class="afix-1" href="?index.php&p=checkout&glink=1">Create share link</a>
                                <?php } ?>
                                </small></div>
                        </div>
                    </div>
                </div>
                <form class="form-horizontal" method="post" action="">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->

                    
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order <div class="pull-right"><small><a class="afix-1" href="?p=cartlist">Edit Cart</a></small></div>
                        </div>
                        <div class="panel-body">
                            <?php if(!empty($cartlist)){
                                foreach($cartlist as $cartli){ 
                            //$subtotal += ($cartli['price']*$_SESSION['cartproduct'][$cartli['id']]['qty']);
                            ?>
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="<?php echo imagepath.$cartli['image']?>" >
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12"></div>
                                    <div class="col-xs-12"><small>Quantity:<span><?php echo $cartli['qty'];?></span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6><span>RS.<?php echo $cartli['price'];?></span></h6>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            <?php } } ?>
                            <div class="form-group panel-info"><div class="panel-heading">Share Link Menu</div></div>
                            <?php if(!empty($emp_cartlist)){ foreach($emp_cartlist as $cartli){ 
                            ?>
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="<?php echo imagepath.$cartli['image']?>" >
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <div class="col-xs-12"></div>
                                    <div class="col-xs-12"><small>Quantity:<span><?php echo $cartli['qty'];?></span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <span><?php echo $cartli['empname'];?></span>
                                </div>
                                <div class="col-sm-3 col-xs-2 text-right">
                                    <h6><span><?php echo curr.$cartli['price'];?></span></h6>
                                </div>
                                <div class="col-sm-3 col-xs-2 text-right">
                                    <a href="javascript:void(0)" data-id="<?php echo $cartli['group_dish_id']; ?>"  class="removedish"><i class="fa fa-times-circle"></i></a>
                                </div>

                                
                            </div>
                            <div class="form-group"><hr /></div>
                            <?php } } ?>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Subtotal</strong>
                                    <div class="pull-right"><span><?php echo curr.$subtotal; ?></span></div>
                                </div>
                                <div class="col-xs-12">
                                    <small>Shipping</small>
                                    <div class="pull-right"><span><?php echo curr.DELIVERYCHARGE; ?></span></div>
                                </div>
                                <div class="col-xs-12">
                                    <small>SGST</small>
                                    <div class="pull-right"><span><?php echo curr.$sgst;?></span></div>
                                </div>
                                <div class="col-xs-12">
                                    <small>CGST</small>
                                    <div class="pull-right"><span><?php echo curr.$cgst;?></span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><span><?php echo curr.$totalamount;?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
				
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Address</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>First Name:</strong>
                                    <input type="text" name="first_name" class="form-control" value="<?php echo $firstname;?>" / required>
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Last Name:</strong>
                                    <input type="text" name="last_name" class="form-control" value="<?php echo $lastname;?>" / required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="<?php echo $crow['address'];?>" / required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>City:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="city" class="form-control" value="<?php echo $crow['city'];?>" / required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>State:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="state" class="form-control" value="<?php echo $crow['state'];?>" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="zip_code" class="form-control" value="<?php echo $crow['postalcode'];?>" data-validation="required  min6"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone Number:</strong></div>
                                <div class="col-md-12"><input type="number" name="phone_number" class="form-control" id="Mobile" pattern="[0-9]{10}" onkeypress="return isNumber(evt);" maxlength="10" value="<?php //echo $crow['number'];?>" required/></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email Address:</strong></div>
                                <div class="col-md-12"><input type="text" name="email_address" class="form-control" value="<?php echo $crow['email'];?>"  required/></div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="paymentpost" value="1">
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT-->
                  

							
							
<label class="checkbox pull-left">
                    <input type="checkbox" name ="paymentmethod" value="cashondelivery" required>
                    CASH ON DELIVERY 
                </label>							
							
							
							
							
							</br></br>
							


							<div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <a href="?p=confirm"/>  <button type="submit"  class="btn btn-primary btn-submit-fix">Place Order</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CREDIT CART PAYMENT END-->
                </div>
                
                </form>
            </div>
            <div class="row cart-footer">
        
            </div>
    </div>
<script type="text/javascript">
    $('.removedish').click(function() {
    var id = $(this).attr('data-id');
    $.ajax({
        type: "POST",
        url: "index.php?p=ajax_function&act=singleremovedish&id="+id,
        data: '',
        success: function(response){
            window.location.href = window.location.href;
        }
    });
});
</script>
<script type="text/javascript">
		function isNumber(evt){
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}	

function onlychar(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8 || key >= 97 && key<= 122);

}
	</script>
    <script type="text/javascript">
        function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
    </script>
    <script src="assets/js/form-validator/jquery.form-validator.min.js"> </script>