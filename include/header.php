<!DOCTYPE html>
<html>
<head>
<title>Food King</title>
<!---->
<link rel="icon" href="assets/logo.png" type="image/icon type">
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />	

<!--for-mobile-apps-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="" />
<meta name="description" content="">
<!--//for-mobile-apps-->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/moment.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<!---->
<link rel="stylesheet" href="assets/css/media.css">


<link rel="stylesheet" type="text/css" href="assets/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/cs-select.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/cs-skin-elastic.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" />
        
		
<link rel="stylesheet" href="assets/css/media.css">

</head>

<body onLoad="" style="background-color:#fff;">
	<div class="topmenu">
 <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="" href="?p=home"><img width="120px" src="assets/logo.png" alt="Foodking"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right tophemenu">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                    <a href="?p=home">Home</a>
                </li>
                <li class="page-scroll">
                    <a href="?p=menu">Order</a>
                </li>
                <li class="page-scroll">
                    <a href="?p=contactus">Contact Us</a>
                </li>
                <?php if(!isset($_SESSION['user_id']) or $_SESSION['user_id'] == ''){ ?>
                <li class="page-scroll">
                    <a href="?p=login">Login</a>
                </li>
                <li class="page-scroll">
                    <a href="?p=register">Register</a>
                </li>
            <?php }else{ ?>
            	<li class="page-scroll">
                    <a href="?p=myaccount">Myaccount</a>
                </li>
                <li class="page-scroll">
                    <a href="?p=logout">Logout</a>
                </li>
            <?php } ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
   </div>
