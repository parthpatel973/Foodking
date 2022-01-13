

  <?php
      
    require_once("include/config.php");
	require_once("include/header.php");
	
	if(file_exists($c)){
		require_once($c);
	}
	if(file_exists($p)){
		require_once($p);	
	}
	
	
?>
