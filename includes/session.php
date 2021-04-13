<?php
session_start();
function message(){
if(isset($_SESSION["message"])){ //password/username not found.
	$output ="<div class=\"message\">";
	$output .=$_SESSION["message"];
	$output .="</div>";
	$_SESSION["message"]=null;
	return $output;
}
}
function errors(){
if(isset($_SESSION["errors"])){
	$output =$_SESSION["errors"];
	$_SESSION["errors"]=null;
	return $output;
}
}

?>