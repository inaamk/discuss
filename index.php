<?php
	session_start();
	include("includes/db.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Discuss the knot - Login</title>
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
					<h2>Login</h2>
				</div>
				
				<hr>
				
				<!--email input-->
				<div class="form-group">
					<input id="email" type="email" class="form-control" name="u_email" placeholder="Email" required="required">
				</div>
				
				<!--pass input-->
				<div class="form-group">
                        <input id="pass" name="u_pass" type="password" placeholder="User Password" class="form-control" data-placement="bottom" data-toggle="popover" data-container="body" type="button" data-html="true" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
				</div>
				
				<!--submit button-->
				<div class="text-center">
					<button type="submit" name="login" class="btn btn-primary">
						<i class="fa fa-sign-in"></i> Login
					</button>
				</div>
			</form>
		</div>
		
		<div class="text-center log">
			<a href="signup.php"> <h3>New? Register Here</h3> </a>
			<a href="forgot_pass.php"> <h3>Forgot Password</h3> </a>
		</div>
		
	</body>
</html>

<?php
	if(isset($_POST['login'])){
		$u_email = $_POST['u_email'];
		$u_pass = $_POST['u_pass'];
		$u_pass2 = md5($u_pass);
		$select_user = "select * from user where u_email='$u_email' AND u_pass='$u_pass2'";
		$run_user = mysqli_query($con,$select_user);
		$row = mysqli_fetch_array($run_user);
		if($row["u_email"]!=$u_email && $row["u_pass"]!=$u_pass2){
			echo "<script>alert('Please check your email and password or click New register  $u_pass2')</script>";
		}else{
			$_SESSION['u_email']=$u_email;
			echo "<script>alert('You are Logged In')</script>";
			echo "<script>window.open('blog.php','_self')</script>";
		}
	}
?>