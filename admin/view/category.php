
<!------ Include the above in your HEAD tag ---------->
  </head>
<body id="LoginForm">
<div class="container">
<h1 class="text-center">Category</h1>
<div class="login-form">
<div class="main-div"> </br></br></br>
    <div class="panel">
   <h2></h2>
   <h4> </h4>
   </div>
    <form id="Login" action="" method="post" enctype="multipart/form-data">

        <div class="form-group">

			<label class="control-label">Category name</label>
            <input type="text" pattern="[a-zA-Z]+"  value="<?php echo isset($row['name'])?$row['name']:''; ?>" name="name" id="name" class="form-control" placeholder="name" >

        </div>
		
       
		<div class="form-group">

			<label class="control-label">Status</label>
            <select class="form-control" name="status">
				<option  value="1">enable</option>
				<option  value="0">disable</option>
				
			</select>

       </div>
	   <?php if(isset($_GET['id']) && $_GET['id'] !=''){ ?>
			<input type="hidden" name="editdata" value="1">
			<input type="hidden" name="category_id" value="<?php echo isset($_GET['id'])?$_GET['id']:''; ?>">
		<?php } ?>

        <button type="submit" class="btn btn-primary">SUBMIT</button>

    </form>
    </div>

</div></div></div>


</body>
</html>
