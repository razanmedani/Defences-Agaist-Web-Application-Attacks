<?php
setcookie("username", "aya",strtotime("+1 day"));
//echo $_COOKIE["username"];

?><!DOCTYPE html>

<html>
<head>
<title>my web page</title>
</head>
<body>

<form action=" " method="get"> 
<input type = "hidden" name = "page" value="about.php" />
 <p>username  :</p><input type = "text" name = "username" value=" " />
  <input type="submit" value="submit" />
</form>



<?php
//XSS testing
   function noHTML($string){
   htmlentities($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
   }
   if(isset($_GET["username"])){
    $name = $_GET["username"];
     echo ($name);
    }


//php code injection
    /* if($_SERVER["REQUEST_METHOD"] == "POST") {
   	  $username=$_REQUEST["username"];
	  @eval ("echo " . $_REQUEST["username"]. ";");
     }
	 
 /*   //command injection
   if($_SERVER["REQUEST_METHOD"] == "POST") {
   	  $IP=$_REQUEST["IP"];
	 shell_exec('cd C:\Windows\System32');
	 
	  $cmd = shell_exec( 'ping ' . $IP);
	  $x= 'ping ' . $IP;
	  var_dump($cmd);
		  echo $x . "<pre> {$cmd} <pre>" ;
		  
   } */

?>