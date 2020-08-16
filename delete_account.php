<?php
	session_start();
	include("includes/db.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Discuss the knot - Delete Account</title>
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
					<h2>Delete Account</h2>
					
				</div>
				
				<hr>
				
				<div class="text-center">
					<p>Do You Really Want to Delete Your Account?</p>
					<input class="btn btn-danger" type="submit" name="yes" value="Yes, I want to delete">
					<input class="btn btn-primary" type="submit" name="no" value="No, I Don,t want to delete">
				</div>
				
			</form>
		</div>
	</body>
</html>

<?php
	$u_email = $_SESSION['u_email'];
	
	$get_user = "select * from user where u_email='$u_email'";
	$run_user = mysqli_query($con,$get_user);
	$row_user = mysqli_fetch_array($run_user);
	
	$u_username = $row_user['u_username'];
	
	if(isset($_POST['yes'])){
		unlink("user_images/$u_username.png");
		$delete_user = "delete from user where u_email='$u_email'";
		$run_delete = mysqli_query($con,$delete_user);
		if($run_delete){
			session_destroy();
			echo "<script>alert('Your Account Has Been Deleted! Good Bye')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		}
	}
	if(isset($_POST['no'])){
		echo "<script>alert('Please Login again!')</script>";
		echo "<script>window.open('logout.php','_self')</script>";
	}
?>