<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container w3-center w3-animate-bottom">
  <h1>WELCOME </h1>
  <p>The website Home Page .</p>
   <form action=" " method="get"> 
 <select name="page">
 <option value="login.php" > Admin login </option>
 <option value="about.php" > About us </option>
 </select>
  <input type="submit"  value="submit" />
 </form>
</div>


</body>
</html>


<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){
         if(isset($_GET["command"])){
			 include($_GET["command"]);
		 }
}
?>