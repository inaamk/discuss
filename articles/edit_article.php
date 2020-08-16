<?php
	session_start();
	include("../includes/db.php");                       
	include("../functions/functions.php");                
?>

<?php
	$admin_session = $_SESSION['u_email'];
	$get_admin = "select * from user where u_email='$admin_session'";
	$run_admin = mysqli_query($con,$get_admin);
	$row_admin = mysqli_fetch_array($run_admin);
	$user_id = $row_admin['u_id'];
	$user_name = $row_admin['u_name'];
	$user_email = $row_admin['u_email'];
	
	if(isset($_GET['art_id'])){
		$art_id = $_GET['art_id'];
		$get_art = "select * from articles where art_id='$art_id'";
		$run_art = mysqli_query($con,$get_art);
		$check_art = mysqli_num_rows($run_art);
		$row_articles = mysqli_fetch_array($run_art);
		$art_id = $row_articles['art_id'];
		$art_title = $row_articles['art_title'];
		$art_text = $row_articles['art_text'];
		
		$u_id = $row_articles['u_id'];
		$art_image = $row_articles['art_image'];
		$art_time = $row_articles['art_time'];
		$art_link = $row_articles['art_link'];
		$cat_id = $row_articles['cat_id'];
		
		$get_cat = "select * from categories where cat_id='$cat_id' ";
		$run_cat = mysqli_query($db,$get_cat);
		$row_cat = mysqli_fetch_array($run_cat);
		$cat_title = $row_cat['cat_title'];
		
		$get_admin = "select * from user where u_id='$u_id'";
		$run_admin = mysqli_query($db,$get_admin);
		$row_admin = mysqli_fetch_array($run_admin);
		$u_name = $row_admin['u_name'];
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Discuss the knot - edit Article</title>
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
		
			<form action="" method="post" enctype="multipart/form-data" >
				
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
					<input type="text" class="form-control" name="art_title" placeholder="Article Title" value=" <?php echo $art_title?>" required="required">
				</div>
				
				<!--Article text-->
				<div class="form-group">
					<textarea type="text" class="form-control" name="art_text" placeholder="Article Text" rows="10" required="required"><?php echo $art_text?></textarea>
				</div>
				
				<!--article image-->
				<div class="form-group">
					<label> Article Image </label>
					<input type="file" class="form-control" name="art_image" style="padding-bottom: 40px;" required></input>
					<img src="article_images/<?php echo $art_image; ?>" width="100" height="100" class="img-responsive" >
				</div>
				
				<!--Article link-->
				<div class="form-group">
					<input type="text" class="form-control" name="art_link" placeholder="Article Link" value=" <?php echo $art_link?>" required="required">
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
					<button type="submit" name="update" class="btn btn-primary">
						<i class="fa fa-align-justify"></i> Edit Article
					</button>
				</div>
			</form>	
		</div>
		
	</body>
</html>

<?php
	if(isset($_POST['update'])){
		$update_id = $art_id;
		
		$get_admin = "select * from user where u_email='$admin_session'";
		$run_admin = mysqli_query($con,$get_admin);
		$row_admin = mysqli_fetch_array($run_admin);
		$u_id = $row_admin['u_id'];
		
		
		$art_title = $_POST['art_title'];
		$art_text = $_POST['art_text'];
		$art_link = $_POST['art_link'];
		
		
		$art_image = $_FILES['art_image']['name'];
		$art_image_tmp = $_FILES['art_image']['tmp_name'];
		move_uploaded_file($art_image_tmp,"article_images/$art_link.png");
		
		
		$cat = $_POST['cat'];
		
		$get_link = "select * from articles where art_link='$art_link'";
		$run_link = mysqli_query($con,$get_link);
		$check_link = mysqli_num_rows($run_link);
		
		if($check_link == 1){
			echo "<script>alert('This link is already registered, try another one')</script>";
		}else{
			$insert_article = "update articles set art_title = '$art_title', art_text ='$art_text', art_image = '$art_link.png', art_link = '$art_link', cat_id = '$cat_id' where art_id='$update_id'";
			$run_article = mysqli_query($con, $insert_article);
			if($run_article){
				echo "<script>alert('Article has been updated successfully')</script>";
				echo "<script>window.open('../blog.php','_self')</script>";
			}else{
				echo "<script>alert('Article has not been updated successfully')</script>";
			}
		}
	}
?>

<?php
	}
?>