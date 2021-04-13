<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/function.php");?>
<?php //confirm_log_in(); ?>
<?php require_once("../includes/validation.php");?>
<?php $layout_context="admin" ; ?>
<?php //include("../includes/layout/header.php");?>
<?php 
find_all_admins();
$admin=find_admin_with_id($_GET["admin"]);
?>
<?php
if (!$admin["id"]){
redirect_to("http://localhost/p/public/master.php?page=manage_admins.php");
}
?>
<?php
$id=$admin["id"];
$query="DELETE FROM admins WHERE id={$id} LIMIT 1";
$result=mysqli_query($connection,$query);
	
if($result && mysqli_affected_rows($connection)==1){
		$_SESSION["message"]="admin deleted.";
	redirect_to("http://localhost/p/public/master.php?page=manage_admins.php");
}else{
	$_SESSION["message"]="admin deletion failed.";
	redirect_to("http://localhost/p/public/master.php?page=manage_admins.php&admin={$id}");
	
}
?>
<?php include("../includes/layout/footer.php"); ?>