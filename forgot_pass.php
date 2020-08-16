<?php
	session_start();
	include("includes/db.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Discuss the knot - Forget Password</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<link href="style.css" rel="stylesheet">
	</head>
	<body class="signup">
		<div  class="signup-form">
			<form name="myform" action="" method="post" enctype="multipart/form-data" >
				<div class="form-header">
					<h2>Forget Password</h2>
				</div>
				
				<hr>
				
				<!--email input-->
				<div class="form-group">
					<input id="email" type="email" class="form-control" name="u_email" placeholder="Email" required="required">
				</div>
				
				<!--submit button-->
				<div class="text-center">
					<button type="submit" name="forgot_pass" class="btn btn-primary">
						<i class="fa fa-envelope"></i> Send email
					</button>
				</div>
			</form>
		</div>
		
		<div class="text-center log">
			<a href="index.php"> <h3>Go back</h3> </a>
		</div>
		
	</body>
</html>

<?php
	if(isset($_POST['forgot_pass'])){
		$u_email = $_POST['u_email'];
		$select_user = "select * from user where u_email='$u_email'";
		$run_user = mysqli_query($con,$select_user);
		$row = mysqli_fetch_array($run_user);
		if($row["u_email"]!=$u_email){
			echo "<script>alert('This email does not exist in our database')</script>";
		}
		
		else{
			//$_SESSION['u_email']=$u_email;
			$to = $u_email;
			$subject = "Password";
			$txt = "Enter no link to change passwoord";
			$headers = "From: n1a9n8o9@gamil.com" . "\r\n" ."CC: inaam_kabbara@hotmail.com";
			mail($to,$subject,$txt,$headers);
			echo "<script>alert('Your link is just send to your email. Please check your email.')</script>";
			/* echo "<script>window.open('index.php','_self')</script>"; */
		}
	}
?>