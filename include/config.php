<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "foodking";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";


session_start();

define('webpath',$_SERVER['DOCUMENT_ROOT'].'foodking/');
define('website','http://localhost/foodking/');
define('websiteadmin','http://localhost/foodking/admin');
define('imagepath','http://localhost/foodking/image/product/');
define('DELIVERYCHARGE',5);
define('GST',24);
define('owneremail','ammarkoka@gmail.com');
define('curr','Rs.');
define('Site_NAME','Foodking');
define('Site_Contact','+91 9898989898');


require_once("common_function.php");
//echo $_GET['p'];
if(isset($_GET['p']) && $_GET['p'] != ''){
	$p = 'view/'.$_GET['p'].'.php';
	$c = 'controller/'.$_GET['p'].'_con.php';
	//echo $p;
}else{
	//$hf=false;
	$p = 'view/home.php';
	$c = 'controller/home_con.php';
}
?>
