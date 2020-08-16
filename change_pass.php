<?php
	session_start();
	include("includes/db.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Discuss the knot - Change Password</title>
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
					<h2>Change Password</h2>
				</div>
				
				<hr>
				
				<!--pass input-->
				<div class="form-group">
				
					<div class="form-group">
						<input id="old_pass" name="old_pass" type="password" placeholder="Old Password" class="form-control" data-placement="bottom" data-toggle="popover" data-container="body" type="button" data-html="true" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">  
					</div>
					
                    <span id="popover-password-top" class="hide pull-right block-help"><i class="fa fa-info-circle text-danger" aria-hidden="true"></i> Enter a strong password</span>
                    <div>
                        <input id="pass" name="u_pass" type="password" placeholder="User Password" class="form-control" data-placement="bottom" data-toggle="popover" data-container="body" type="button" data-html="true" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">  
                        <!--pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"-->
						<div id="popover-password">
                            <p>Password Strength: <span id="result"> </span></p>
                            <div class="progress">
                                <div id="password-strength" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                </div>
                            </div>
                            <ul class="list-unstyled">
                                <li class=""><span class="low-upper-case"><i class="fa fa-file-text" aria-hidden="true"></i></span>&nbsp; 1 lowercase &amp; 1 uppercase</li>
                                <li class=""><span class="one-number"><i class="fa fa-file-text" aria-hidden="true"></i></span> &nbsp;1 number (0-9)</li>
                                <li class=""><span class="one-special-char"><i class="fa fa-file-text" aria-hidden="true"></i></span> &nbsp;1 Special Character (!@#$%^&*).</li>
                                <li class=""><span class="eight-character"><i class="fa fa-file-text" aria-hidden="true"></i></span>&nbsp; Atleast 8 Character</li>
                            </ul>
                        </div>
						<!-- generate pass -->
						<div class="form-group">
							<div class="row">
								<div class="col-sm-4 col-xs-4">
									<input class="form-control" name="row_password" type="text" size="40" readonly>
								</div>
								<div class="col-sm-4 col-xs-4">
									<input type="button" class="button btn btn-primary" value="Generate" onClick="randomPassword(10);" tabindex="2">
								</div>
							</div>
						</div>
						
                    </div>
					
					
				</div>
				
				<!--confirm pass input-->
				<div class="form-group">
                    <span id="popover-cpassword" class="hide pull-right block-help"><i class="fa fa-info-circle text-danger" aria-hidden="true"></i> Password don't match</span>
                    <div>
						<input id="con_pass" name="u_confirm_password" type="password" placeholder="Password Confirmation" class="form-control input-md" required>
                    </div>
                </div>
				
				<!--submit button-->
				<div class="text-center">
					<button type="submit" name="reset_pass" class="btn btn-primary">
						<i class="fa fa-refresh"></i> Change
					</button>
				</div>
			</form>
		</div>
		
		<script>
			/* function randomPassword(length) {
				var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
				var pass = "";
				for (var x = 0; x < length; x++) {
					var i = Math.floor(Math.random() * chars.length);
					pass += chars.charAt(i);
				}
				myform.row_password.value = pass;
			} */
			
			function randomPassword(len){
				var length = (len)?(len):(8);
				var string = "abcdefghijklmnopqrstuvwxyz"; //to upper 
				var numeric = '0123456789';
				var punctuation = '!@#$%^&*()_+~`|}{[]\:;?><,./-=';
				var password = "";
				var character = "";
				var crunch = true;
				while( password.length<length ){
					entity1 = Math.ceil(string.length * Math.random()*Math.random());
					entity2 = Math.ceil(numeric.length * Math.random()*Math.random());
					entity3 = Math.ceil(punctuation.length * Math.random()*Math.random());
					hold = string.charAt( entity1 );
					hold = (password.length%2==0)?(hold.toUpperCase()):(hold);
					character += hold;
					character += numeric.charAt( entity2 );
					character += punctuation.charAt( entity3 );
					password = character;
				}
				myform.row_password.value = password;
			}
			
		</script>
		
		<script>
			$(document).ready(function(){
				
				$('#pass').keyup(function(){
					var pass = $('#pass').val();
					if (checkStrength(pass) == false){
						$('#sign-up').attr('disabled', true);
					}
				});
				
				$('#con_pass').blur(function(){
					if ($('#pass').val() !== $('#con_pass').val()){
						$('#popover-cpassword').removeClass('hide');
						$('#sign-up').attr('disabled', true);
						alert("please match password");
					}else{
						$('#popover-cpassword').addClass('hide');
					}
				});


				function checkStrength(password){
					var strength = 0;
					
					//If password contains both lower and uppercase characters, increase strength value.
					if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)){
						strength += 1;
						$('.low-upper-case').addClass('text-success');
						$('.low-upper-case i').removeClass('fa-file-text').addClass('fa-check');
						$('#popover-password-top').addClass('hide');
					}else{
						$('.low-upper-case').removeClass('text-success');
						$('.low-upper-case i').addClass('fa-file-text').removeClass('fa-check');
						$('#popover-password-top').removeClass('hide');
					}

					//If it has numbers and characters, increase strength value.
					if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)){
						strength += 1;
						$('.one-number').addClass('text-success');
						$('.one-number i').removeClass('fa-file-text').addClass('fa-check');
						$('#popover-password-top').addClass('hide');
					}else{
						$('.one-number').removeClass('text-success');
						$('.one-number i').addClass('fa-file-text').removeClass('fa-check');
						$('#popover-password-top').removeClass('hide');
					}

					//If it has one special character, increase strength value.
					if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)){
						strength += 1;
						$('.one-special-char').addClass('text-success');
						$('.one-special-char i').removeClass('fa-file-text').addClass('fa-check');
						$('#popover-password-top').addClass('hide');
					}else{
						$('.one-special-char').removeClass('text-success');
						$('.one-special-char i').addClass('fa-file-text').removeClass('fa-check');
						$('#popover-password-top').removeClass('hide');
					}

					if (password.length > 7){
						strength += 1;
						$('.eight-character').addClass('text-success');
						$('.eight-character i').removeClass('fa-file-text').addClass('fa-check');
						$('#popover-password-top').addClass('hide');
					}else{
						$('.eight-character').removeClass('text-success');
						$('.eight-character i').addClass('fa-file-text').removeClass('fa-check');
						$('#popover-password-top').removeClass('hide');
					}

					// If value is less than 2
					if (strength < 2){
						$('#result').removeClass();
						$('#password-strength').addClass('progress-bar-danger');
						$('#result').addClass('text-danger').text('Very Week');
						$('#password-strength').css('width', '10%');
					}else if (strength == 2){
						$('#result').addClass('good');
						$('#password-strength').removeClass('progress-bar-danger');
						$('#password-strength').addClass('progress-bar-warning');
						$('#result').addClass('text-warning').text('Week')
						$('#password-strength').css('width', '40%');
						return 'Week';
					}else if (strength == 3){
						$('#result').removeClass();
						$('#password-strength').removeClass('progress-bar-warning');
						$('#password-strength').addClass('progress-bar-info');
						$('#result').addClass('text-info').text('Good')
						$('#password-strength').css('width', '60%');
						return 'Week';
					}else if (strength == 4){
						$('#result').removeClass()
						$('#result').addClass('strong');
						$('#password-strength').removeClass('progress-bar-info');
						$('#password-strength').addClass('progress-bar-success');
						$('#result').addClass('text-success').text('Strength');
						$('#password-strength').css('width', '100%');
						return 'Strong';
					}
				}
			});
		</script>
	</body>
</html>

<?php
	if(isset($_POST['reset_pass'])){
		$u_email = $_SESSION['u_email'];
		$old_pass = $_POST['old_pass'];
		$old_pass2 = md5($old_pass);
		
		$u_pass = $_POST['u_pass'];
		$u_pass2 = md5($u_pass);
		
		$u_confirm_password = $_POST['u_confirm_password'];
		$sel_old_pass = "select * from user where u_pass='$old_pass2'";
		$run_old_pass = mysqli_query($con,$sel_old_pass);
		$check_old_pass = mysqli_num_rows($run_old_pass);
		
		$uppercase = preg_match('@[A-Z]@', $u_pass);
		$lowercase = preg_match('@[a-z]@', $u_pass);
		$number    = preg_match('@[0-9]@', $u_pass);
		$specialChars = preg_match('@[^\w]@', $u_pass);
		
		if($check_old_pass==0){
			echo "<script>alert('Your Current Password is not valid try again')</script>";
			exit();
		}
		if($u_pass!=$u_confirm_password){
			echo "<script>alert('Your New Password does not match')</script>";
			exit();
		}
		if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($u_pass) < 8){
			echo "<script>alert('Your password should be more then 8 characters')</script>";
		}else{
			$update_pass = "update user set u_pass='$u_pass2' where u_email='$u_email'";
			$run_pass = mysqli_query($con,$update_pass);
			if($run_pass){
				echo "<script>alert('Your Password Has been Changed Successfully. Please login again')</script>";
				echo "<script>window.open('logout.php','_self')</script>";
			}
		}
	}
?>