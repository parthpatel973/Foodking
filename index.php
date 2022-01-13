

  <?php
      
    require_once("include/config.php");
	if(file_exists($c)){
		require_once($c);
	}
	require_once("include/header.php");
	
	
	if(file_exists($p)){
		require_once($p);	
	}
	
	
	require_once("include/footer.php");
	
	
?>
