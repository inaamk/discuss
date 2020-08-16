<?php
	session_start();
	include("../includes/db.php");                       
	include("../functions/functions.php");
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
		
		<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<link href="../style.css" rel="stylesheet">
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
	$art_id = $_GET['art_id'];
	
	$get_art = "select * from articles where art_id='$art_id'";
	$run_art = mysqli_query($con,$get_art);
	$check_art = mysqli_num_rows($run_art);
	$row_articles = mysqli_fetch_array($run_art);
	
	$art_link = $row_articles['art_link'];
	
	if(isset($_POST['yes'])){
		unlink("article_images/$art_link.png");
		$delete_article = "delete from articles where art_id='$art_id'";
		$run_delete = mysqli_query($con,$delete_article);
		if($run_delete){
			echo "<script>alert('Your Article Has Been Deleted! Good Bye')</script>";
			echo "<script>window.open('../blog.php','_self')</script>";
		}
	}
	if(isset($_POST['no'])){
		echo "<script>window.open('details.php?art_id=$art_id','_self')</script>";
	}
?>