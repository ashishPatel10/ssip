<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="Stylesheet" href=ssip_theme.css>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <li><a href="#"> <font size="5" color="white">SSS MALL</font></a></li> <br><br>
</nav>
<br><br>
<div class="container">
<h3>WELCOME TO OUR MALL ENTER THE CREDENTIALS FOR ENTERING DATA</h3>	
</div>
<br><br>
<div class="container" >
	
	<form method="post" action="validate.php">
	<font color="black" size="5">Username</font> <input type="text" name="email" id="email"> <br><br><br>

	<font color="black" size="5">Password</font> <input type="password" name="password" id="pass"><br><br><br>
	<font color="black" size="5">Remember me </font><input type="checkbox" name="remember"><br><br><br>
	<input type="submit" name="login" value="login" class="btn btn-primary">
	<!-- <button class=" btn btn" name="login" value="login" type="submit">login</button> -->
	
</form>

</div>

 <?php 
if(isset ($_COOKIE['email']) and isset($_COOKIE['pass']))
{
$email=$_COOKIE['email'];
 $pass= $_COOKIE['pass'];
 echo "<script> 
 
 document.getElementById('email').value='$email';
 document.getElementById('pass').value='$pass';
</script>";
}
 ?>


</body>
</html>