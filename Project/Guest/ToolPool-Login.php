<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST["btnsubmit"]))
{
	$mail=$_POST["txtmail"];
	$pass=$_POST["txtpw"];
	$selqry="select * from tbl_user where user_email='".$mail."' and user_password='".$pass."'";
	$re=$conn->query($selqry);
	$toolqry="select * from tbl_toolshop where toolshop_email='".$mail."' and toolshop_password='".$pass."'";
	$res=$conn->query($toolqry);
	$adminqry="select * from tbl_admin where admin_email='".$mail."' and admin_password='".$pass."'";
	$reslt=$conn->query($adminqry);
	$boyqry="select * from tbl_deliveryboy where boy_email='".$mail."' and boy_password='".$pass."'";
	$result=$conn->query($boyqry);	
	if($row=$re->fetch_assoc())
	{
		$_SESSION["userid"]=$row["user_id"];
		$_SESSION["username"]=$row["user_name"];
		header("Location:../User/Homepage.php");
	}
	else if($row=$res->fetch_assoc())
	{
		if($row['toolshop_vstatus']==1){
		$_SESSION["shopid"]=$row["toolshop_id"];
		$_SESSION["shopname"]=$row["toolshop_name"];
		header("Location:../Shop/Homepage.php");
		}
		else{
			echo "<script> alert ('Account not verified');</script>";
		}
	}
	else if($row=$reslt->fetch_assoc())
	{
		$_SESSION["userid"]=$row["admin_id"];
		$_SESSION["username"]=$row["admin_name"];
		header("Location:../Admin/HomePage.php");
	}
	else if($row=$result->fetch_assoc())
	{
		$_SESSION["boyid"]=$row["boy_id"];
		$_SESSION["boyname"]=$row["boy_name"];
		header("Location:../DeliveryBoy/HomePage.php");
	}
	else
	{
		echo "<script>alert('Incorrect Email or Password')</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ToolPool-Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="..\Assets\Images\tpicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/css/main.css">
<!--===============================================================================================-->
<style>
	.bg-overlay {
		background: black;
		position: absolute;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		width: 100%;
		height: 100%;
		opacity: 0.85;
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		align-content: center;
	}
	@keyframes slideInFromLeft {
		0% {
			transform: translateX(-100%);
		}
		100% {
			transform: translateX(0);
		}
	}
	h1{
		animation: 1s ease-out 0s 1 slideInFromLeft;
	}
	h3{
		animation: 1.3s ease-out 0s 1 slideInFromLeft;
	}
	@keyframes slideInFromRight {
		0% {
			transform: translateX(100%);
		}
		100% {
			transform: translateX(0);
		}
	}
	@keyframes fadeIn {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
	.tp-logo{
		animation: fadeIn 3s;
	}
	.trans{
		animation: fadeIn 5s;
	}
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="">
					<span class="login100-form-title p-b-43">
						<img class="tp-logo" src="..\Assets\Images\tp.png" height="200px">
					</span>
					<div class="trans">						
						<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
							<input class="input100" type="text" name="txtmail" id="txtmail" autocomplete="off">
							<span class="focus-input100"></span>
							<span class="label-input100">Email</span>
						</div>
						
						
						<div class="wrap-input100 validate-input" data-validate="Password is required">
							<input class="input100" type="password" name="txtpw" id="txtpw" autocomplete="off">
							<span class="focus-input100"></span>
							<span class="label-input100">Password</span>
						</div>

						<div class="container-login100-form-btn">
							<button type="submit" class="login100-form-btn" name="btnsubmit">Login</button>
								
						</div>
						
						<div class="container-reg100-form-btn">
							<a href="User.php" class="reg100-form-btn">
								Create an Account
							</a>
						</div>
					</div>	
				</form>

				<div class="login100-more" style="background-image: url('../Assets/Template/Login/images/bg-01.jpg');">
					<div class="bg-overlay">
						<div class="container" style="display: flex;flex-direction: column;align-items: center; color: #ff992b;">
							<h1 style="font-weight: 800;font-size: 64px;">ToolPool</h1>
							<h3>One Stop the tools and machines you need</h3>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="../Assets/Template/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/Login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="../Assets/Template/Login/vendor/bootstrap/js/bootstrap.min.js"></script>

<!--===============================================================================================-->
	<script src="../Assets/Template/Login/js/main.js"></script>

</body>
</html>