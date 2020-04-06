<?php 
include 'connection.php';
$myemail="a@gmail.com";
$mypass="123456";

if(isset($_POST['login']))
	{
		$email= $_POST['email'];
		$pass = $_POST['password'];
		//$sql=mysqli_query($conn,"select * from login where username='$email' and password='$pass'");
		//mysqli_num_rows($sql)==1
		if($email == $myemail and $pass == $mypass)
		{

			if (isset( $_POST['remember'])) 
			{
				setcookie('email', $email, time()+60*60*10);
				setcookie('pass', $pass, time()+60*60*10);	
			}
			session_start();
			$_SESSION['email']=$email;
			$_SESSION['password']=$pass;
			header("location: welcome.php");
		}
		else
		{
			echo "<script>alert('Incorrect credentials')</script>";
			echo "<script>location.href='login.php'</script>";	
		}
	}
	else
	{
		header("location: login.php");
	}


 ?>