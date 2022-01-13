	<script src="assets/js/common.js"></script>
	
	<!--footer-->
			<div class="footer-w3l">
				<div class="container">
					<div class="footer-grids">
						<div class="col-md-3 footer-grid">
							<h4>About Foodking</h4>
							<ul>
                                <li><i class="glyphicon glyphicon-hand-right" aria-hidden="true"></i><a href="?p=aboutus"/>About Us</li>


                                <li><i class="glyphicon glyphicon-hand-right" aria-hidden="true"></i><a href="?p=privacypolicy"/>Privacy Policy</li>
								
                                <li><i class="glyphicon glyphicon-hand-right" aria-hidden="true"></i><a href="?p=terms"/>Terms & Condition</li>
								
							 
								
								</a>
							</ul>
						</div>
					
                        
                        
                        <div class="col-md-3 footer-grid">
					<div> <h4>Customer Service </h4>
			            	<ul>
			 					<li><a href="?p=contactus">Contact Us</a></li>
			 					<li><a href="?p=feedback">Feedback</a></li>
							</ul>
							
							</div>
								
						</div>
                        
						<div class="col-md-3 footer-grid">
							<h4>My Account</h4>
							<ul>
								<li><a href="?p=myaccount">My Account</a></li>
								<li><a href="?p=orderhistory">Order History</a></li>
							</ul>
						</div>
						<div class="col-md-3 footer-grid">
							<h4> Social Connect</h4>
							<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
							
							<a href="https://www.facebook.com"/> <i class="fab fa-facebook-f"></i></a>
							<a href="https://www.instagram.com"/> <i class="fab fa-instagram"></i></a>
							<a href="https://www.twitter.com"/><i class="fab fa-twitter"></i></a>
							 <a href="https://www.youtube.com"/> <i class="fab fa-youtube"></i></a>
							<!--<form action="#" method="post">
								<p>Name</p>
								<input type="text" name="Name" placeholder="" required>
								<p>password</p>
								<input type="password" name="Password" placeholder="" required>
								<input type="submit" value="LOGIN">
							</form>-->
							

			<div class="clearfix">
                        <div class="footer-top text-center">
                                <p></p>
                            </div>
                            
					
				</div>
			</div>
<div id="alertbox" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:35%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body text-center" >
		<div id="alertboxbody"></div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>


</div>

<script>
$('#rp_submit').click(function() {	
 $('#rp_submit').attr('disabled',true);
	var email = $('#email').val();
	var rp_rest_name = $('#rp_rest_name').val();
	var rp_website = $('#rp_website').val();
	var rp_name = $('#rp_name').val();
	var rp_city = $('#rp_city').val();
	var rp_email = $('#rp_email').val();
	var rp_phone = $('#rp_phone').val();
	var rp_comments = $('#rp_comments').val();
	var rp_type_cuision = $('#rp_type_cuision').val();
	
	
	var dataString = "rp_rest_name="+rp_rest_name+"&rp_website="+rp_website+"&rp_name="+rp_name+"&rp_city="+rp_city+"&rp_email="+rp_email+"&rp_phone="+rp_phone+"&rp_comments="+rp_comments+"&rp_type_cuision="+rp_type_cuision+"&isAajax=1&act=restaurantpartner";
	if(rp_rest_name == '' || rp_website == '' || rp_name == '' || rp_city == '' || rp_email == '' || rp_phone == '' || rp_comments == ''){
		alert('All Field Required..');
		$('#rp_boxalert').addClass('alert-danger alert');
		$('#rp_boxalert').html('All Field Required..');
		$('#rp_submit').attr('disabled',false);
		return false;
	}
	$.ajax({
			type: "POST",
			url: "controller/ajax_cart.php",
			data: dataString,
			dataType : 'html',
			success: function(response)
			{
				$('#rp_rest_name').val('');
				$('#rp_name').val('');
				$('#rp_city').val('');
				$('#rp_email').val('');
				$('#rp_phone').val('');
				$('#rp_website').val('');
				$('#rp_comments').val('');
				$('#rp_type_cuision').val('');
				
				
				$('#rp_boxalert').addClass('alert-success alert');
				$('#rp_boxalert').html(response);
				$('#rp_submit').attr('disabled',false);
			}
		});
});

</script>
</body>
</html>
