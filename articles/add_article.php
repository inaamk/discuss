<?php
	session_start();
	include("../includes/db.php");
?>

<?php
	$admin_session = $_SESSION['u_email'];
	$get_admin = "select * from user where u_email='$admin_session'";
	$run_admin = mysqli_query($con,$get_admin);
	$row_admin = mysqli_fetch_array($run_admin);
	$u_id = $row_admin['u_id'];
	$u_name = $row_admin['u_name'];
	$u_email = $row_admin['u_email'];
	$u_username = $row_admin['u_username'];
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Discuss the knot - Add Article</title>
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
		
			<form action="add_article.php" method="post" enctype="multipart/form-data" >
				
				<div class="form-header">
					<h2>Add Article</h2>
					<p>Fill out this form to present your article!</p>
				</div>
				
				<hr>
				
				<!--admin name-->
				<div class="form-group">
					<input type="text" class="form-control" name="u_id" required="required" value=" <?php echo $u_name?>" readonly>
				</div>
				
				<!--Article title-->
				<div class="form-group">
					<input type="text" class="form-control" name="art_title" placeholder="Article Title" required="required">
				</div>
				
				<!--Article text-->
				<div class="form-group">
					<textarea type="text" class="form-control" name="art_text" placeholder="Article Text" rows="10" required="required"></textarea>
				</div>
				
				<!--article image-->
				<div class="form-group">
					<label> Article Image </label>
					<input type="file" class="form-control" name="art_image" style="padding-bottom: 40px;" required></input>
				</div>
				
				<!--Article link-->
				<div class="form-group">
					<input type="text" class="form-control" name="art_link" placeholder="Article Link" required="required">
					<p>Article Link example: discuss-the-Knot</p>
				</div>
				
				<div>
					<select class="form-group" name="cat">
					<?php
						$get_cat = "select * from categories order by cat_title ASC";
						$run_cat = mysqli_query($con, $get_cat);
						while ($row_cat = mysqli_fetch_array($run_cat)){
							$cat_id = $row_cat['cat_id'];
							$cat_title = $row_cat['cat_title'];
							echo " <option value='$cat_id'> $cat_title </option>";
						}
					?>
					</select>
				</div>
				
				<div class="text-center"><!-- text-center Starts -->
					<button type="submit" name="add" class="btn btn-primary">
						<i class="fa fa-align-justify"></i> Add Article
					</button>
				</div>
			</form>	
		</div>
	</body>
</html>

<?php
	if(isset($_POST['add'])){
		
		$admin_session = $_SESSION['u_email'];
		$get_admin = "select * from user where u_email='$admin_session'";
		$run_admin = mysqli_query($con,$get_admin);
		$row_admin = mysqli_fetch_array($run_admin);
		$u_id = $row_admin['u_id'];
		
		
		$art_title = $_POST['art_title'];
		$art_text = $_POST['art_text'];
		$art_link = $_POST['art_link'];
		
		
		
		$art_image = $_FILES['art_image']['name'];
		$art_image_tmp = $_FILES['art_image']['tmp_name'];
		
		$cat = $_POST['cat'];
		
		$get_link = "select * from articles where art_link='$art_link'";
		$run_link = mysqli_query($con,$get_link);
		$check_link = mysqli_num_rows($run_link);
		
		if($check_link == 1){
			echo "<script>alert('This link is already registered, try another one')</script>";
		}else{
			
			$insert_article = "insert into articles ( u_id, art_title, art_text, art_image, art_link, cat_id) values ('$u_id', '$art_title',  '$art_text', '$art_link.png', '$art_link', '$cat')";
			$run_article = mysqli_query($con, $insert_article);
			if($run_article){
				move_uploaded_file($art_image_tmp,"article_images/$art_link.png");
				echo "<script>alert('Article has been inserted successfully')</script>";
				echo "<script>window.open('../blog.php','_self')</script>";
			}else{
				echo "<script>alert('Article has not been inserted successfully')</script>";
			}
		}
	}
?>