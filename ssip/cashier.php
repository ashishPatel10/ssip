<?php 
	include 'connection.php';
	//session_start();

	session_start();

// if(isset($_POST['login']))
// 	{
 		//$email= $_POST['email'];
 		//$pass = $_POST['pass'];
 		//if ($email == $_SESSION['email'] and $pass==$_SESSION['password']) {
		if (!(isset($_SESSION['email']) and isset($_SESSION['password']))) 
		{
		header("location: login.php");
		}
		
	// }
	//else{
 	//header("location: login.php");
	// }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="Stylesheet" href=ssip_theme.css>
	<title>cashier</title>
</head>
<body>
	<?php include 'header.php'; ?>
	<div class="container">
		<h3>PAYMENT:</h3><br><br>
<br><br>
	<button style="width:auto;" class="btn btn-primary" onclick="location.href = 'scan.php';">SCAN QR CODE</button></div>
	

</body>
</html>