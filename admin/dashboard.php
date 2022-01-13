

  <?php
      
    require_once("include/config.php");
	require_once("include/header.php");
	?>
	<div class="col-md-12">
	<div class="col-md-12 float-left ">
	<?php require_once("include/dashboardmenu.php"); ?></div>
	<div class="col-md-9 float-left">
	<?php if(file_exists($c)){
		require_once($c);
	}
	if(file_exists($p)){
		require_once($p);	
	} ?>
	</div>
	</div>	
	
