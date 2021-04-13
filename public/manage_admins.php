<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/function.php");?>
<?php confirm_log_in(); ?>

<?php 
$result=find_all_admins();

?>
<?php $layout_context="admin" ; ?>
<?php // include("../includes/layout/header.php");?>


   
   <div id="navigation">
   <a href="http://localhost/p/public/master.php?page=admin.php"> &laquo; MAIN menu </a>
   &nbsp;
</div>
   <div id="page">
  <?php echo message();?>
<h2>Manage Admin</h2>
<table>
<tr>
<th style="text-align: left; width:200px;" >username</th> 
<th colspan= "2" style="text-align: left;" >Action</th>  <br/>
</tr>
<?php 
while($admin=mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?php echo htmlentities($admin["username"]) . "<br />"; ?></td>
    <td><?php echo "<a href=\"http://localhost/p/public/master.php?page=edit_admin.php&admin=";
	echo urlencode($admin["id"]);
	echo "\">";
	echo "Edit </a>&nbsp"; ?></td>
    <td><?php echo "<a href=\"http://localhost/p/public/master.php?page=delete_admin.php&admin=";
	echo urlencode($admin["id"]);
	echo "\"";
	echo "onclick= \"return confirm('Are you sure?');\"";
	echo "> Delete </a>"; ?> </td> </tr>
	
	<?php
} ?>
</table>
<br /> <br/>


<a href="http://localhost/p/public/master.php?page=new_admin.php"> +Add new admin </a>
</div>
</div>
<?php include("./footer.php"); ?>