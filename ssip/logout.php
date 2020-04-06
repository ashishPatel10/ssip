<?php 

session_start();


// if(isset($_POST['login']))
// 	{
// 		$email= $_POST['email'];
// 		$pass = $_POST['pass'];
// 		if ($email == $myemail and $pass==$mypass) {
		if (isset($_SESSION['email']) and isset($_SESSION['password'])) {
		session_destroy();
		header("location: login.php");
			
	 	}
		
	// }
	 else{
		header("location: login.php");
	 }

 ?>