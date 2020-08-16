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
		$art_text = nl2br($row_articles['art_text']);
		
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
		<title>Discuss the knot - Add Article</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<link href="../css.css" rel="stylesheet">
	</head>
	<body>
		<?php
			if($user_id ==$u_id){
				echo "
					<div class='art'>
						<h3>$art_title</h3>					
						<h4>$u_name</h4>
						<button class='btn btn-primary'><a href='edit_article.php?art_id=$art_id'> Edit article </a></button>
						<button class='btn btn-primary'><a href='delete_article.php?art_id=$art_id'> Delete article </a></button>
						<p>$art_time</p>
						<p> $cat_title </p>
						<img src='article_images/$art_link.png' class='img-responsive' alt='$cat_title'>
						<p oncopy='return false;' class='art-text'> $art_text </p>
						<a href='../blog.php'> Back </a>
						<hr>
					</div>";
			}else{
				echo"
					<div class='art'>
						<h3>$art_title</h3>					
						<h4>$u_name</h4>
						<p>$art_time</p>
						<p> $cat_title </p>
						<img src='article_images/$art_link.png' class='img-responsive' alt='$cat_title'>
						<p oncopy='return false;' class='art-text'> $art_text </p>
						<a href='../blog.php'> Back </a>
						<hr>
					</div>";
			}
			?>
	</body>
</html>
<?php
	}
?>