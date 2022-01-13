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
function addtocart(id){
	var pid = id;
	$.ajax({  
         type:"POST",  
         url:"index.php?p=ajax_function&act=addtocart",  
         data:"pid="+pid,  
         complete:function(data){  
            location = "index.php?p=cartlist";
         }  
      });  
}

	</script>
 <div class="container">
        <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="gallery-title">Menu</h1>
        </div>
        <div class="text-right form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <span>Share Order? : </span>
        <a class="btn btn-primary" href="?index.php&p=checkout">Create share link</a>
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
                <img width="300px;" height="300px;" src="<?php echo imagepath.$product['image']?>" class="">
				<div class="name"><b><?php echo $product['prod_name']?></b></div>
				<div class="name"><small><?php echo $product['discription']?></small></div>
				<div class="name form-group">Rs.<?php echo $product['price']?></div>
				<div class="cartbutton"><button class="btn btn-primary" onclick="addtocart(<?php echo $product['prod_id']?>);" ><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Addtocart</button></div>
				
            </div>
			<?php } ?>

            
           

           
			
        </div> 
    </div>
	
	