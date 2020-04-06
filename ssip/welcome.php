<?php 
session_start();

// if(isset($_POST['login']))
// 	{
 		//$email= $_POST['email'];
 		//$pass = $_POST['pass'];
 		//if ($email == $_SESSION['email'] and $pass==$_SESSION['password']) {
		if (isset($_SESSION['email']) and isset($_SESSION['password'])) 
		{
		echo "welcome";
		}
		
	// }
	else{
 	header("location: login.php");
	 }
		//echo "gd";

 ?>