<script>
	$(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            $('.filter').show('1000');
        }
        else
        {
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});



	</script>
 <div class="container">
        <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="gallery-title">Menu</h1>
        </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="gallery-title text-center">Organize By : <?php echo $ordelink['ownername'];?></h1>
            <h2 class="gallery-title text-center">Date Added : <?php echo $ordelink['date'];?></h2>
        </div>

        <div align="center">
            <button class="btn btn-default filter-button" data-filter="all">All</button>
			<?php foreach($datas as $data){?>
            <button class="btn btn-default filter-button" data-filter="cate_<?php echo $data['id']?>"><?php echo $data['name']?></button>
			<?php } ?>
			
        </div>
        <br/>

		
			<?php foreach($products as $product){
                
                ?>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 form-group text-center filter cate_<?php echo $product['cate_id']?>">
                <img width="300px;"height="300px;" src="<?php echo imagepath.$product['image']?>" class="">
				<div class="name"><b><?php echo $product['prod_name']?></b></div>
				<div class="name"><small><?php echo $product['discription']?></small></div>
				<div class="name form-group">Rs.<?php echo $product['price']?></div>
				<div class="cartbutton"><button  type="button" class="quickviewbtn btn btn-primary" data_id="<?php echo $product['prod_id'] ?>" data_name = "<?php echo $product['name']?>" ><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Select</button></div>
				
            </div>
			<?php } ?>

            
           

           
			
        </div> 
    </div>
	<div id="quickview" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:50%">

    <!-- Modal content-->
    <div class="modal-content">
      <!--<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>-->
      <div class="modal-body text-center" >
        <div id="quickviewbody"></div>
         <div class="text-center"><button type="button" class="addtocart btn btn-primary red" id="adddish">Submit</button></div>
         </div>
         
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
<script type="text/javascript">
    $('.quickviewbtn').click(function(){
    productid = $(this).attr('data_id');
    data_name = $(this).attr('data_name');
    $('#adddish').removeClass('hidden');    
    var dataString = '<h1 class="text-center">Confirm your meal</h1><div id="dishtext" class="text-center"><p class="text-center">You`ve selected: </p><h1 class="text-center" id="dishname">'+data_name+'</h1><p class="text-center">Let us know your name so we can label your meal: </p><br><input type="text" placeholder="Your Name" class="form-control" name="employename" id="employename"><br><input type="hidden" id="dishproductid" value="'+productid+'">';   
    event.preventDefault();
    jQuery.noConflict();
 
    $('#quickviewbody').html(dataString);
    $('#quickview').modal('show');
    
});
    $('#adddish').click(function(){
    productid = $('#dishproductid').val();
    employename = $('#employename').val();
    var dataString = "productid="+productid+"&employename="+employename+"&token=<?php echo $_REQUEST['token']; ?>";

    $.ajax({
        type: "POST",
        url: "index.php?p=ajax_function&act=adddishemployee",
        data: dataString,
        success: function(response){
            //$('#adddish').addClass('hidden');
            $('#quickview').modal('hide');
            var html = '<div class="text-center"><h1 class="alert-success"></a>Thanks '+employename+'</h1><br><h1>You`re all set! </h1></div>';
            $('#alertboxbody').html(html);  
            $('#alertbox').modal('show');
            
        }
    });     
    
    
});
</script>