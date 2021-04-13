<?php require_once("../includes/session.php");?>
<?php require_once("../includes/function.php");?>
<?php confirm_log_in(); ?>
<?php $layout_context="admin"; ?>
<?php //include("../includes/layout/header.php");?>

    <div id="navigation">
   &nbsp;
</div>
   <div id="page">
     <h2>Admin Menu</h2>
	 <p> Welcome to the admin area,<?php if(isset($_SESSION["username"])) echo htmlentities($_SESSION["username"]); ?></p>
	 <ul>
	
	 <li><a href="http://localhost/p/public/master.php?page=manage_admins.php">
	 Manage Admin Users</a></li>
	 <li><a href="http://localhost/p/public/master.php?page=login.php">Logout</a></li>
	 </ul>
	</div>
 </div>
<?php include("footer.php"); ?>