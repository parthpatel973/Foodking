
<!------ Include the above in your HEAD tag ---------->
  </head>
<body id="LoginForm">
<div class="container">
<h1 class="text-center">Product Form </h1>
<div class="login-form">
<div class="main-div"> </br></br></br>
    <div class="panel">
   <h2></h2>
   <h4>Please enter your product details </h4>
   </div>
    <form id="Login" action="" method="post" enctype="multipart/form-data">

        <div class="form-group">

			<label class="control-label">Name</label>
            <input type="text"  value="<?php echo isset($row['name'])?$row['name']:''; ?>" name="name" id="inputEmail" class="form-control" placeholder="name" pattern="[A -z -a]+" required>

        </div>
		
		<div class="form-group">

			<label class="control-label">Discription</label>
           <textarea name="discription" class="form-control"><?php echo isset($row['discription'])?$row['discription']:''; ?></textarea>

        </div>
		
		<div class="form-group">

			<label class="control-label">Category</label>
            <select class="form-control" name="category">
			<?php foreach($category_list as $category_li){?>
				<option <?php echo isset($row['category']) && $category_li['id']==$row['category']?'selected':''  ?> value="<?php echo $category_li['id'];?>"><?php echo $category_li['name'];?></option>
			<?php } ?>
				
			</select>

        </div>
		
		 <div class="form-group">

			<label class="control-label">Price</label>
            <input type="text" value="<?php echo isset($row['price'])?$row['price']:''; ?>" name="price" id="price" class="form-control" placeholder="price" pattern="[0-9]+" required>

        </div>
		
		<div class="form-group">

			<label class="control-label">Image</label>
            <input type="file" name="image" id="image" class="form-control" placeholder="image" >
			<input type="hidden" name="imagevalue" value="<?php echo isset($row['image'])?$row['image']:''; ?>">

        </div>
		
		 <div class="form-group">

			

			<label class="control-label">Status</label>
            <select class="form-control" name="status">
				<option value="1">enable</option>
				<option value="0" >disable</option>
				
			</select>

        </div>

        </div>
		

		<?php if(isset($_GET['id']) && $_GET['id'] !=''){ ?>
			<input type="hidden" name="editdata" value="1">
			<input type="hidden" name="product_id" value="<?php echo isset($_GET['id'])?$_GET['id']:''; ?>">
		<?php } ?>
        <input type="submit" name="submit" class="btn btn-primary" value="Submit"> 

    </form>
    </div>

</div></div></div>


</body>
</html>
