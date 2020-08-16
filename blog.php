<?php
	session_start();
	include("includes/db.php");
	include("functions/functions.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Discuss the knot</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<link href="css.css" rel="stylesheet">
	</head>
	
	<body>
		<div class="hot">
			<?php
				if(isset($_SESSION['u_email'])){
					$user_session = $_SESSION['u_email'];
					$get_user = "select * from user where u_email='$user_session'";
					$run_user = mysqli_query($con,$get_user);
					$row_user = mysqli_fetch_array($run_user);
					$u_id = $row_user['u_id'];
					$u_name = $row_user['u_name'];
					$u_email = $row_user['u_email'];
					$u_username = $row_user['u_username'];
					$u_image = $row_user['u_image'];
					
					
					echo "
						<div class='dropdown' style='float:right;'>
							<button class='dropbtn'>$u_username <i class='fa fa-caret-down'></i></button>
							<div class='dropdown-content'>
								<img src='user_images/$u_image' width='100' height='100' class='img-responsive' >
								<p>$u_name</p>
								<p>$u_email</p>
								<a href='articles/add_article.php'>Add article</a> <br>
								<a href='update_account.php'>Edit Account</a> <br>
								<a href='change_pass.php'>Change Password</a> <br>
								<a href='delete_account.php'>Delete Account</a> <br>
								<a href='logout.php'>Logout</a>
							</div>
						</div>
					";
				} 
			?>
		</div>
		
		<div>
			<div class="col-md-3">
				<?php include("includes/sidebar.php"); ?>
			</div>
			<div  class="row col-md-9" id="Articles" >
				<?php getArticles(); ?>
			</div>
			<center>
			<ul class="pagination">
				<?php getPaginator(); ?>
			</ul>
			</center>
		</div>
		
		<script src="js/jquery.min.js"> </script>
		<script src="js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function(){
				/// Hide And Show Code Starts ///
				$('.nav-toggle').click(function(){
					$(".panel-collapse,.collapse-data").slideToggle(700,function(){
						if($(this).css('display')=='none'){
							$(".hide-show").html('Show');
						}
						else{
							$(".hide-show").html('Hide');
						}
					});
				});
				/// Hide And Show Code Ends ///
				/// Search Filters code Starts /// 
				$(function(){
					$.fn.extend({
						filterTable: function(){
							return this.each(function(){
								$(this).on('keyup', function(){
									var $this = $(this), 
									search = $this.val().toLowerCase(), 
									target = $this.attr('data-filters'), 
									handle = $(target), 
									rows = handle.find('li a');
									if(search == '') {
										rows.show(); 
									} else {
										rows.each(function(){
											var $this = $(this);
											$this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
										});
									}
								});
							});
						}
					});
					$('[data-action="filter"][id="dev-table-filter"]').filterTable();
				});
				/// Search Filters code Ends /// 
			});
		</script>
			
			<script>
				$(document).ready(function(){
					// getProducts Function Code Starts 
					function getArticles(){
						
						// Manufacturers Code Starts 
						var sPath = ''; 
						var aInputs = $('li').find('.get_adm');
						var aKeys = Array();
						var aValues = Array();
						iKey = 0;
						$.each(aInputs,function(key,oInput){
							if(oInput.checked){
								aKeys[iKey] =  oInput.value
							};
							iKey++;
						});
						if(aKeys.length>0){
							var sPath = '';
							for(var i = 0; i < aKeys.length; i++){
								sPath = sPath + 'adm[]=' + aKeys[i]+'&'; 
							}
						}
						// Manufacturers Code ENDS 
						
						// Categories Code Starts 
						var aInputs = Array();
						var aInputs = $('li').find('.get_cat');
						var aKeys  = Array();
						var aValues = Array();
						iKey = 0;
						$.each(aInputs,function(key,oInput){
							if(oInput.checked){
								aKeys[iKey] =  oInput.value
							};
							iKey++;
						});
						if(aKeys.length>0){
							for(var i = 0; i < aKeys.length; i++){
								sPath = sPath + 'cat[]=' + aKeys[i]+'&';
							}
						}
						// Categories Code ENDS 
						// Loader Code Starts 
						$('#wait').html('<img src="images/load.gif">'); 
						// Loader Code ENDS
						// ajax Code Starts 
						$.ajax({
							url:"load.php", 
							method:"POST",
							data: sPath+'sAction=getArticles', 
							success:function(data){
								$('#Articles').html('');  
								$('#Articles').html(data);
								$("#wait").empty();
							}  
					});  
					$.ajax({
						url:"load.php",  
						method:"POST",  
						data: sPath+'sAction=getPaginator',  
						success:function(data){
							$('.pagination').html('');  
							$('.pagination').html(data);
						}  
					});
					// ajax Code Ends   
				}
				// getProducts Function Code Ends 
				$('.get_adm').click(function(){
					getArticles(); 
				});
				$('.get_cat').click(function(){
					getArticles(); 
				});
			}); 
		</script>
	</body>
</html>