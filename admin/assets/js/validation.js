$(document).ready(function(){
	//Stripe.setPublishableKey('pk_test_gvJCH3XJioNikxAOzCunymDa');
	Stripe.setPublishableKey('pk_live_Jizh7wHPfd9J8aNcG8NgBQjR');
	

		function addInputNames() {
                    // Not ideal, but jQuery's validate plugin requires fields to have names
                    // so we add them at the last possible minute, in case any javascript 
                    // exceptions have caused other parts of the script to fail.
                    $(".card-number").attr("name", "card-number")
                    $(".card-cvc").attr("name", "card-cvc")
                    $(".card-expiry-year").attr("name", "card-expiry-year")
                }

    function removeInputNames() {
                    $(".card-number").removeAttr("name")
                    $(".card-cvc").removeAttr("name")
                    $(".card-expiry-year").removeAttr("name")
                }
	$('input[type=radio][name=payment_method]').on('change', function() {
		var ptype = $("input[name=payment_method]:checked").val();
		if(ptype=='stripe'){
			$("#paypalinput").html('');
			$("#crditcardshow").css("display","");
		}else{
			$("#paypalinput").html('<input name="Paypal" type="hidden" value="Paypal">');
			$("#crditcardshow").css("display","none");
		}
	});
	//global vars
	var form = $("#payment-form");
	var groupnametext = $("#groupnametext");
	var groupnametext_Info = $("#groupnametext_Info");
    var organizertext = $("#organizertext");
	var organizertext_Info = $("#organizertext_Info");		var companytext = $("#companytext");	var companytext_Info = $("#companytext_Info");
	//alert(groupnametext);
	var card_number = $("#card-number");
	var card_name = $("#card-name");
	var card_cvc = $("#card-cvc");
	var card_numberInfo = $("#card_numberInfo");
	//var card_nameInfo = $("#card_nameInfo");
	var card_cvcInfo = $("#card_cvcInfo");
	
	
	
	//opt1.blur(validateRadio);
	card_number.blur(validatecardnumber);
	
	card_cvc.blur(validatecardcvc);
	//On key press
	
	//opt1.keyup(validateRadio);
	card_number.keyup(validatecardnumber);
	//card_name.keyup(validatecardname);
	card_cvc.keyup(validatecardcvc);
	
	$('input[type="submit"]').click(function(event) {	
//alert(event);	
				//event.preventDefault();
				var input = $(event.currentTarget);
				var which_button = event.currentTarget.value;
				
			
				if($("input[name=payment_method]").is(":checked")){
					var pay_select = $("input[name=payment_method]:checked").val();
				}else{
					alert('please Select Payment Method.');
					return false;
				}
				//alert(pay_select);
                if(validatemetting() && validateorganize() && validatecompany()){    
						//alert(which_button);
						if(pay_select =='Paypal'){
							$("form").submit();
							return true;
						}else if(pay_select == 'Payafter'){
							$("form").submit();
							return true;
						}else if(pay_select == 'polipayment'){
							$("form").submit();
							return true;
						}else if(pay_select == 'COD'){
							$("#payaction").val('COD');
							$("form").submit();
							return true;
						}else if(pay_select =='stripe'){
							  if(validatecardnumber() & validatecardcvc()){								  
										$('.checkout_btn').attr("disabled", "disabled");
										$("body").append('<div id="loading"><ul class="bokeh"><li></li><li></li><li></li></ul></div>');
							            Stripe.createToken({
										number: $('.card-number').val(),
										cvc: $('.card-cvc').val(),
										exp_month: $('.card-expiry-month').val(),
										exp_year: $('.card-expiry-year').val()										}, function(status, response) {
											if (response.error) {
												$("div").remove("#loadimg");												// re-enable the submit button
												$('.checkout_btn').removeAttr("disabled")

							
												//alert();
												// show the error

												$("#payment-errors").html('<span class="error">'+response.error.message+'</span>');



												// we add these names back in so we can revalidate properly

												

											} else {

												// token contains id, last4, and card type

												var $form = $("#payment-form");

												var token = response['id'];



												// insert the stripe token

												$form.append("<input name='stripeToken' value='" + token + "' style='display:none;' />");

												$form.submit();

												// and submit

											}

											});

							 }

							return false;	

						}else{

						return false;

						}

				}else{ 
						$("#crditcardshow").css("display","none");
						return false;
				}
                });
                
	//On Submitting
	/*
	form.submit(function(){
		if(validateFirstName() & validateLastName() & validateAddress() & validatePhone()& validateZip()& validateCrossStreet()& validateEmail() & validateRadio() & checkPassword()){
			stripeResponseHandler();
			return true;
		} else {
			return false;
		}
	});
	*/
	
	function validatecardnumber(){
		//if it's NOT valid
		if(card_number.val() == '' ){
		   // first_name.addClass("error");
			card_numberInfo.text("Please enter your credit card number");
			card_numberInfo.addClass("error");
			return false;
		} //if it's valid
		else{
			//first_name.removeClass("error");
            card_numberInfo.text("");
			card_numberInfo.removeClass("error");
			return true;
		}
	}
	function validatecardname(){
		//if it's NOT valid
		if(card_name.val() == '' ){
			card_nameInfo.text("Please enter your card Name");
			card_nameInfo.addClass("error");
			return false;
		} //if it's valid
		else{
			//first_name.removeClass("error");
            card_nameInfo.text("");
			card_nameInfo.removeClass("error");
			return true;
		}
	}
	function validatecardcvc(){
		//if it's NOT valid
		if(card_cvc.val() == '' ){
		   // first_name.addClass("error");
			card_cvcInfo.text("Please enter your cvc number");
			card_cvcInfo.addClass("error");
			return false;
		} //if it's valid
		else{
			//first_name.removeClass("error");
            card_cvcInfo.text("");
			card_cvcInfo.removeClass("error");
			return true;
		}
	}
	
	//validation functions
	/*function validateRadio(){
		return true;
		var opt=myRadio.filter(':checked').val();
		if(myRadio.is(":checked")==false){
			radio_nameInfo.text("Please Select one option");
			radio_nameInfo.addClass("error");
			return false;
		}else{
            radio_nameInfo.text("");
			radio_nameInfo.removeClass("error");
			return true;
		}
	}*/
	function validatemetting(){
		//if it's NOT valid
		//alert(groupnametext.val());
		if(groupnametext.val() == '' ){
		   // first_name.addClass("error");
			groupnametext_Info.text("Please enter Meeting Name");
			groupnametext_Info.addClass("alert alert-warning");
			return false;
		} //if it's valid
		else{
			//first_name.removeClass("error");
            groupnametext_Info.text("");
			groupnametext_Info.removeClass("alert alert-warning");
			return true;
		}
	}
	function validatecompany(){		if(companytext.val() == '' ){			companytext_Info.text("Please enter Company.");			companytext_Info.addClass("alert alert-warning");			return false;		}else{            companytext_Info.text("");			companytext_Info.removeClass("alert alert-warning");			return true;		}	}
    function validateorganize(){
		//if it's NOT valid
		//alert(organizertext.val());
		if(organizertext.val() == '' ){
		   //last_name.addClass("error");
			organizertext_Info.text("Please enter Organizer.");
			organizertext_Info.addClass("alert alert-warning");
			return false;
		}
		//if it's valid
		else{
			//last_name.removeClass("error");
            organizertext_Info.text("");
			organizertext_Info.removeClass("alert alert-warning");
			return true;
		}
	}

    function validateAddress(){
		//if it's NOT valid
		if(address.val() == '' ){
			//address.addClass("error");
			addressInfo.text("Please enter street address.");
			addressInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			//address.removeClass("error");
            addressInfo.text("");
			addressInfo.removeClass("error");
			return true;
		}
	}
   function validateCrossStreet(){
		//if it's NOT valid
		if(cross_street.val() == '' ){
		   // cross_street.addClass("error");
			cross_streetInfo.text("Please enter your city & state.");
			cross_streetInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			//cross_street.removeClass("error");
            cross_streetInfo.text("");
			cross_streetInfo.removeClass("error");
			return true;
		}
	}
	
   function validatestate(){
		//if it's NOT valid
		if(state.val() == '' ){
		   // cross_street.addClass("error");
			stateInfo.text("Please enter your Province.");
			stateInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			//cross_street.removeClass("error");
            stateInfo.text("");
			stateInfo.removeClass("error");
			return true;
		}
	}
   function validatecity(){
		//if it's NOT valid
		if(city.val() == '' ){
		   // cross_street.addClass("error");
			cityInfo.text("Please enter your city.");
			cityInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			//cross_street.removeClass("error");
            cityInfo.text("");
			cityInfo.removeClass("error");
			return true;
		}
	}
	
	function validatestreet_number(){
		//if it's NOT valid
		if(street_number.val() == '' ){
		   // cross_street.addClass("error");
			street_numberInfo.text("Please enter your Street Number.");
			street_numberInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			//cross_street.removeClass("error");
            street_numberInfo.text("");
			street_numberInfo.removeClass("error");
			return true;
		}
	}
   function validatePhone(){
		//testing regular expression
		var a = $("#phone_no").val();
		var filter = /^[0-9\-\(\)\+\s]+$/;
		//if it's valid email
        if(phone_no.val() == '' ){
		    //phone_no.addClass("error");
			phone_noInfo.text("Please enter phone number.");
			phone_noInfo.addClass("error");
			return false;
		}

		if(filter.test(a)){
			phone_no.removeClass("error");
			phone_noInfo.text("");
			phone_noInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			//phone_no.addClass("error");
            phone_noInfo.text("Please enter valid phone number");
			phone_noInfo.addClass("error");
			return false;
		}
	}
	function validateZip(){
		//testing regular expression
		var postalCode = $("#zip_no").val();
		//alert(postalCode);
		/*var filter = /^[0-9\-\(\)\+\s]+$/;
		//if it's valid email
        if(zip_no.val() == '' ){
		   // zip_no.addClass("error");
			zip_noInfo.text("Please enter zip number");
			zip_noInfo.addClass("error");
			return false;
		}

		if(filter.test(a)){
			//zip_no.removeClass("error");
			zip_noInfo.text("");
			zip_noInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			//zip_no.addClass("error");
            zip_noInfo.text("Please enter valid zip number");
			zip_noInfo.addClass("error");
			return false;
		}*/
		if(postalCode ==undefined){
			zip_noInfo.text("");
			return true;
			}else{
		if (!postalCode) {
			zip_noInfo.text("Please enter Postal Code");
       	 	return false;
    	}
    	postalCode = postalCode.toString().trim();
		var us = new RegExp("^\\d{5}(-{0,1}\\d{4})?$");
		var ca = new RegExp(/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/);
		
		if (ca.test(postalCode.toString().replace(/\W+/g, ''))) {
			zip_noInfo.text("");
			return true;
			
		}else{
		zip_noInfo.text("Please enter valid Postal Code (A0A0A0 OR A0A-0A0)");
		return false;
		}
		}
	}
	
	function validateEmail(){
		//testing regular expression
		var a = $("#email").val();
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		//if it's valid email
        if(email.val() == '' ){
		   // email.addClass("error");
			email_Info.text("Please enter your email");
			email_Info.addClass("error");
			return false;
		}

		if(filter.test(a)){
			//email.removeClass("error");
			email_Info.text("");
			email_Info.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			//email.addClass("error");
            email_Info.text("Please enter valid email");
			email_Info.addClass("error");
			return false;
		}
	}
});
function submitAction()
{
    document.getElementById("frmProduct").submit();
    return false;
}
function submitform()
{
    document.getElementById("payment-form").submit();
    return false;
}
function checkPassword(){
		var optradio=$("input[name='login_type']:checked").val();
		var password=$("#password");
		var cnpassword=$("#cnpassword");
		var password_Info=$("#password_Info");
		var cnpassword_Info=$("#cnpassword_Info");
		var flg=false;
		
		if(optradio=="newregi"){
			 if(password.val() == '' ){
					password_Info.text("Please insert password");
					password_Info.addClass("error");
					flg=false;
				} else {
					password_Info.text("");
					password_Info.removeClass("error");
					flg=true;
				}
				if(cnpassword.val() == '' ){
					cnpassword_Info.text("Please insert confirm password");
					cnpassword_Info.addClass("error");
					flg=false;
				}
				else{
					cnpassword_Info.text("");
					cnpassword_Info.removeClass("error");
					flg=true;
				}
				if(password.val() != '' && cnpassword.val() != ''){
						if(password.val() != cnpassword.val() ){
						// password.addClass("error");
						// cnpassword.addClass("error");
						cnpassword_Info.text("Password and confirm password mishmatch!");
						cnpassword_Info.addClass("error");
						flg=false;
					}else{
						//password.removeClass("error");
						//cnpassword.removeClass("error");
						cnpassword_Info.text("");
						cnpassword_Info.removeClass("error");
						flg=true;
					}
				} 
				if(flg){
					return flg;
				}
				return false;
			}
			return true
	}
function checkcoupon(){
	var code = $('#coupon_code').val();
	var total = $('#vpb_main_total_cart_items').val();
				
	var dataString = "code="+code+"&total="+total+"&isAajax=1&act=checkcode";
	$.ajax({
			type: "POST",
			url: "view/ajax_request.php",
			data: dataString,
			dataType : 'json',
			success: function(response)
			{
				//alert(JSON.parse(response.resp));
				if(response.resp == 'rest'){
					$('#coupon_Info').html('This Resturant Not Used This Coupon');
					$("#coupon_code").val('');
				}else if(response.resp == 'maxtotal'){
					$('#coupon_Info').html('Minimum Order Total');
					$("#coupon_code").val('');
				}else if(response.resp == 'used'){
					$('#coupon_Info').html('Minimum Used This Coupon Code');
					$("#coupon_code").val('');
				}else if(response.resp == 'userused'){
					$('#coupon_Info').html('Minimum Used Single User');
					$("#coupon_code").val('');
				}else if(response.resp == 'invalid'){	
					$('#coupon_Info').html('Invalid Code');
					$("#coupon_code").val('');
				}else if(response.resp == 'login'){	
					$('#coupon_Info').html('Login Requireds.');
					$("#coupon_code").val('');
					
				}else if(response.resp.code != ''){
					var newstring = "coupondata="+JSON.stringify(response.resp)+"&act=couponadd";
					$.ajax({
						type: "POST",
						url: "controller/ajax_cart.php?act=couponadd",
						data: newstring,
						success: function(newresponse)
						{
							$("#response").html(newresponse);
							$("#couponcode").html('<label class="text-width">Coupon : </label><span class="textbox-width"><input type="hidden" name="coupon" value="1"><input type="hidden" name="coupon_code" value="'+response.resp.code+'"> Apply Your Coupon Code</div>');
							
						}
					});
				}
			}
		});
}
$(function() {
				var Amercicancardno =new RegExp('^(?:3[47][0-9]{13})$');
				var Discovercardno = new RegExp('^(?:6(?:011|5[0-9][0-9])[0-9]{12})$');
				var visacardno = new RegExp('^(?:4[0-9]{12}(?:[0-9]{3})?)$');
				var mastercardcardno = new RegExp('^(?:5[1-5][0-9]{14})$');
				var Dinnerscardno = new RegExp('^(?:3(?:0[0-5]|[68][0-9])[0-9]{11})$');
				var JCBcardno = new RegExp('^(?:(?:2131|1800|35\d{3})\d{11})$');
				var result=false;
			$('#card-number').keyup(function(){
				result=cardnumber($('#card-number').val());
				 if(result == false){
                $('#card-number').removeClass();
                $('#card-number').addClass('card-number form-control')
				}else{
					$('#card-number').addClass(result);
				}
				
				if(!result){
					$('#card-number').removeClass("valid");
				}else{
					$('#card-number').addClass("valid");
				}
			})
            function cardnumber(inputtxt){
				
				
				
				/*
				if(inputtxt.value.match(Amercicancardno)){  
					return 'amercican';  
				}
				else */
				if(visacardno.test(inputtxt)){  
					return 'visa';  
				}
				else
				if(mastercardcardno.test(inputtxt)){  
					  return 'mastercard';  
				}
				else				
				if(Discovercardno.test(inputtxt)){  
					  return 'discover';  
				}
				/*else
			    if(inputtxt.match(Dinnerscardno)) {  
				   return 'dinners';  
				}else
				if(inputtxt.match(JCBcardno)){  
					return 'jcb';  
				} */
				 else {  
 				 return false;  
				}
			} 
        });
	
	
	
	