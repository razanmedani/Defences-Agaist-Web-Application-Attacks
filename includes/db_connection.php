<?php
define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_PASS","aya");
define("DB_NAME","wiget" );
$connection=mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(mysqli_connect_errno()){
	die("DATABASE CONNECTION FAILED". mysqli_connect_error() ."(" . mysqli_connect_errno() .")");
}
?>