<?php require_once("../includes/session.php");?>
<?php require_once("../includes/function.php");?>

<?php
//v1: simple logout
//session_start();
$_SESSION["admin_id"]=null;
$_SESSION["username"]=null;
redirect_to('http://localhost/p/public/master.php?page=login.php');
?>

<?php
//v2 : session destroy
//assume nothing in session to keep 
session_start();
$_SESSION = array();
if(isset($_COOKIE[session_name()])){
	setcookie(session_name(),'',time()-42000,'/'); //let it equal '' , and exipres time in past 
}
session_destroy();
redirect_to('http://localhost/p/public/master.php?page=login.php');
?>