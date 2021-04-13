<?php
function redirect_to($new_location){
	header("Location: {$new_location}");
	exit;
}
function confirm_query($result_set){
	if(!$result_set){
	die("database query failed");
}
}

function find_admin_with_id($admin_id){
	
	global $connection;
	$safe_admin_id=mysqli_real_escape_string($connection,$admin_id);
	$query="SELECT * FROM admins WHERE id={$safe_admin_id} LIMIT 1";
	$admin_set=mysqli_query($connection,$query);
	confirm_query($admin_set);
	if($admin=mysqli_fetch_assoc($admin_set)){
		return $admin;
	}
	else return null;
}
function find_all_admins()
{ 
		global $connection;
$query ="SELECT * FROM admins ";
$query.="ORDER BY username ASC";
$result=mysqli_query($connection,$query);
confirm_query($result);

return $result;
}
function find_all_subjects($public=true){
	global $connection;
$query ="SELECT * FROM subjects ";
if($public){
$query.="WHERE visible=1 ";
}
$query.="ORDER BY position ASC";

$result=mysqli_query($connection,$query);
confirm_query($result);
return $result;
}
function find_pages_for_subject($subject_id,$public=true){
	global $connection;
$query ="SELECT * FROM pages ";
$query .="WHERE subject_id={$subject_id} ";
if($public){
$query.="AND visible=1 ";
}
$query.="ORDER BY position ASC";
$page_result=mysqli_query($connection,$query);
confirm_query($page_result);
return $page_result;
}

function find_page_with_id($page_id){
	global $connection;
	$safe_page_id=mysqli_real_escape_string($connection,$page_id);
	$query="SELECT * FROM pages WHERE id={$safe_page_id} LIMIT 1";
	$page_set=mysqli_query($connection,$query);
	confirm_query($page_set);
	if($page=mysqli_fetch_assoc($page_set)){
		return $page;
	}
	else return null;
}
function find_subject_with_id($subject_id){
	global $connection;
	$safe_subject_id=mysqli_real_escape_string($connection,$subject_id);
$query ="SELECT * FROM subjects ";
$query.="WHERE id={$safe_subject_id} ";
$query.="LIMIT 1";
$result=mysqli_query($connection,$query);
confirm_query($result);
if($subject=mysqli_fetch_assoc($result)){
		return $subject;
	}
	else return null;

}
function find_default_page($subject_id){
	$page_set=find_pages_for_subject($subject_id);
	if($first_page=mysqli_fetch_assoc($page_set)){
		return $first_page;
	}
	else return null;
	
}
function find_selected_page($public=false){
	global $current_subject;
	global $current_page;
	if (isset($_GET["subject"])){
	$current_subject=find_subject_with_id($_GET["subject"]);
	if($public){
	$current_page=find_default_page($current_subject["id"]);
	}else  {$current_page=null;}
}elseif (isset($_GET["page"])){
	$current_page=find_page_with_id($_GET["page"]);
	$current_subject=null;
}else{
	$current_subject=null;
	$current_page=null;
}
}

function form_error($errors=array()){

	$output=" ";
	if(!empty($errors)){
		$output ="<div class=\"error\">";
		$output .="Please fix the following errors: ";
		$output .="<ul>";
		foreach($errors as $key => $value )
		{
		$output .="<li>";
		$output .=htmlentities($value);
		$output .="</li>";
		}
	}
	$output .="</ul";
		$output .="</div";
	return $output;
}
function pages_in_subject($subject_id)
{
	$output="<ul class=\"pages\">";
	$page_result=find_pages_for_subject($subject_id);
	while($page=mysqli_fetch_assoc($page_result)){
	$output .=" <li><a href=\"manage_content.php?subject=";
	 $output.=urlencode($subject_id);
$output.="\">";
	  $output.=$page["menu_name"] ;
$output.=" </a></li>";	
}
 $output .="</ul>";
	return $output;
}
	

function navigation(){
	global $current_subject;
	global $current_page;
	$result=find_all_subjects(false);
	 $output ="<ul class=\"subjects\">";
while($subject=mysqli_fetch_assoc($result)){
$output.="<li";
if($subject["id"] == $current_subject["id"]){
$output.= " class=\"selected\"";
}
$output.= ">";
$output.="<a href=\"manage_content.php?subject=";
$output.= urlencode($subject["id"]) ;
 $output.="\">";
 $output.= htmlentities($subject["menu_name"]);
$output.=" </a>";
$output.="<ul class=\"pages\">";
$page_result=find_pages_for_subject($subject["id"],false);

while($page=mysqli_fetch_assoc($page_result)){
	$output.=" <li";
	if($page["id"] == $current_page["id"]){
$output.= " class=\"selected\"";
}
	$output.= "><a href=\"manage_content.php?page=";
	 $output.=urlencode($page["id"]);
$output.="\">";
	  $output.=htmlentities($page["menu_name"]) ;
$output.=" </a></li>";	
}
$output.="</ul></li>";
	
}
 mysqli_free_result($result);
$output.="</ul>";
return $output;	
}
function public_navigation(){
	global $current_subject;
	global $current_page;
	$result=find_all_subjects();
	 $output ="<ul class=\"subjects\">";
while($subject=mysqli_fetch_assoc($result)){
$output.="<li";
if($subject["id"] == $current_subject["id"]){
$output.= " class=\"selected\"";
}
$output.=">";
$output.="<a href=\"index.php?subject=";
$output.= urlencode($subject["id"]);
 $output.="\">";
 $output.= $subject["menu_name"];
$output.=" </a>";
$output.="<ul class=\"pages\">";
$page_result=find_pages_for_subject($subject["id"]);

while($page=mysqli_fetch_assoc($page_result)){
	$output.="<li";
	if($page["id"] == $current_page["id"]){
$output.= " class=\"selected\"";
}
	$output.="><a href=\"index.php?page=";
	 $output.=urlencode($page["id"]);
$output.="\">";
	  $output.=$page["menu_name"] ;
$output.=" </a></li>";	
}
$output.="</ul></li>";
	
}
 mysqli_free_result($result);
$output.="</ul>";
return $output;	
}
function encrypt_password($password){
	$hash_format="$2y$10$"; //tell php to use blowfish with cost of 10 (how much to run it ,the more it runs the slower it will be)
	$salt_length=22; //blowfish salt should be 22 character or more
	$salt=generate_salt($salt_length);
	$format_and_salt= $hash_format . $salt;
	$hash=crypt($password,$format_and_salt);
	return $hash;
}

function generate_salt($length){
	//md5 return 32 char
	$unique_random_str=md5(uniqid(mt_rand(),true));
	$base64_str=base64_encode($unique_random_str);//salt valid[a-zA-Z./ ]
	$modified_base64_str=str_replace("+",".",$base64_str);//but not + which is valid in base64_encode
	$salt=substr($modified_base64_str,0,$length); //truncate string to correct length
	return $salt;
}
function password_check($password,$existing_hash){
	
	$hash=crypt($password,$existing_hash);
	if($hash==$existing_hash){
		return true;
	}else{
		
		return false;
	}
}
function attempt_login($username,$password){
	
	$admin=find_admin_with_username($username);//query +prepared statement
	//PASSWORD_DEFAULT - Use the bcrypt algorithm (default as of PHP 5.5.0). Note that this constant is designed to change over time as new and stronger 
	//algorithms are added to PHP. For that reason, the length of the result from using this identifier can change over time. Therefore, it is recommended 
	//to store the result in a database column that can expand beyond 60 characters (255 characters would be a good choice). 
	
	$hash = password_hash($password, PASSWORD_DEFAULT);
	
	
	
	//check passsword
	if($admin){
		if(password_verify($password, $hash)){
			return $admin;
		}else{
			if ( password_needs_rehash($hash, PASSWORD_DEFAULT)){
			return $admin;
		}
		else{
			return false;
			}
		}
		
	}else
	{
		return false;
	}
}
function find_admin_with_username($username){
	
	global $connection;
	$safe_username=mysqli_real_escape_string($connection,$username);
	mysqli_stmt_init($connection);
	$query="SELECT * FROM admins WHERE username= ? LIMIT 1";
	//$admin_set=mysqli_query($connection,$query);
	$stmt =mysqli_prepare($connection, $query);
    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "s", $safe_username);
	mysqli_stmt_execute($stmt);
	//mysqli_stmt_store_result($stmt);
	$admin_set = mysqli_stmt_get_result($stmt);
	confirm_query($admin_set);
	if($admin=mysqli_fetch_assoc($admin_set)){
		return $admin;
	}else 
	{return null;}
}
  function logged_in()
 {
	return isset($_SESSION["admin_id"]);
 }
  function confirm_log_in(){
	if(!logged_in()){
		redirect_to("http://localhost/p/public/master.php?page=login.php");
	}	
   }
   
   
?>