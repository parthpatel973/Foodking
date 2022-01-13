
	<div class="menu">
			<ul class="nav nav-pills nav-stacked">
				<li class="<?php echo (isset($_GET['p']) && $_GET['p']=='home'?'active':''); ?>"><a href="?p=home">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
				
				
				<li class="<?php echo (isset($_GET['p']) && $_GET['p']=='productlisting'?'active':''); ?>"><a href="?p=productlisting">Products<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list"></span></a></li>
				
				
				<li class="<?php echo (isset($_GET['p']) && $_GET['p']=='categorylisting'?'active':''); ?>"><a href="?p=categorylisting">Category Listing<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list"></span></a></li>
	
				<li class="<?php echo (isset($_GET['p']) && $_GET['p']=='customer'?'active':''); ?>"><a href="?p=customer">Customer<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				
				
				<li class="<?php echo (isset($_GET['p']) && $_GET['p']=='invoice'?'active':''); ?>"> <a href="?p=invoice">Invoice<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				
				<li class="<?php echo (isset($_GET['p']) && $_GET['p']=='contactus'?'active':''); ?>"><a href="?p=contactus">Feedback<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				
				<li class="<?php echo (isset($_GET['p']) && $_GET['p']=='logout'?'active':''); ?>"> <a href="?p=logout">Logout<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				
			</ul>
		</div>