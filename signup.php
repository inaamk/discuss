<?php
	session_start();
	include("includes/db.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Discuss the knot - Sign Up</title>
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
					<h2>Sign Up</h2>
				</div>
				
				<hr>
				
				<!--name input-->
				<div class="form-group">
					<input type="text" class="form-control" name="u_name" placeholder="Full Name" required="required">       	
				</div>
				
				<!--email input-->
				<div class="form-group">
					<span id="popover-email" class="hide pull-right block-help"><i class="fa fa-info-circle text-danger" aria-hidden="true"></i> Enter an valid email address</span>
					<input id="email" type="email" class="form-control" name="u_email" placeholder="Email" required="required">
				</div>
				
				<!--username input-->
				<div class="form-group">
					<input type="input" class="form-control" name="u_username" placeholder="Username" required="required">
				</div>
				
				<!--pass input-->
				<div class="form-group">
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
				
				<!--birthday input-->
				<div class="form-group">
					<div class="row">
						<div class="col-sm-4 col-xs-4">
							<select name="Day" class="form-control">
								<option>-Day-</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
							</select>
						</div>
						<div class="col-sm-4 col-xs-4">
							<select name="Month" class="form-control">
								<option>-Month-</option>
								<option value="January">January</option>
								<option value="Febuary">Febuary</option>
								<option value="March">March</option>
								<option value="April">April</option>
								<option value="May">May</option>
								<option value="June">June</option>
								<option value="July">July</option>
								<option value="August">August</option>
								<option value="September">September</option>
								<option value="October">October</option>
								<option value="November">November</option>
								<option value="December">December</option>
							</select>
						</div>
						<div class="col-sm-4 col-xs-4">
							<select name="Year" class="form-control">
								<option>-Year-</option>
								<option value="2020">2020</option>
								<option value="2019">2019</option>
								<option value="2018">2018</option>
								<option value="2017">2017</option>
								<option value="2016">2016</option>
								<option value="2015">2015</option>
								<option value="2014">2014</option>
								<option value="2013">2013</option>
								<option value="2012">2012</option>
								<option value="2011">2011</option>
								<option value="2010">2010</option>
								<option value="2009">2009</option>
								<option value="2008">2008</option>
								<option value="2007">2007</option>
								<option value="2006">2006</option>
								<option value="2005">2005</option>
								<option value="2004">2004</option>
								<option value="2003">2003</option>
								<option value="2002">2002</option>
								<option value="2001">2001</option>
								<option value="2000">2000</option>
								<option value="1999">1999</option>
								<option value="1998">1998</option>
								<option value="1997">1997</option>
								<option value="1996">1996</option>
								<option value="1995">1995</option>
								<option value="1994">1994</option>
								<option value="1993">1993</option>
								<option value="1992">1992</option>
								<option value="1991">1991</option>
								<option value="1990">1990</option>
								<option value="1989">1989</option>
								<option value="1988">1988</option>
								<option value="1987">1987</option>
								<option value="1986">1986</option>
								<option value="1985">1985</option>
								<option value="1984">1984</option>
								<option value="1983">1983</option>
								<option value="1982">1982</option>
								<option value="1981">1981</option>
								<option value="1980">1980</option>
								<option value="1979">1979</option>
								<option value="1978">1978</option>
								<option value="1977">1977</option>
								<option value="1976">1976</option>
								<option value="1975">1975</option>
								<option value="1974">1974</option>
								<option value="1973">1973</option>
								<option value="1972">1972</option>
								<option value="1971">1971</option>
								<option value="1970">1970</option>
								<option value="1969">1969</option>
								<option value="1968">1968</option>
								<option value="1967">1967</option>
								<option value="1966">1966</option>
								<option value="1965">1965</option>
								<option value="1964">1964</option>
								<option value="1963">1963</option>
								<option value="1962">1962</option>
								<option value="1961">1961</option>
								<option value="1960">1960</option>
								<option value="1959">1959</option>
								<option value="1958">1958</option>
								<option value="1957">1957</option>
								<option value="1956">1956</option>
								<option value="1955">1955</option>
								<option value="1954">1954</option>
								<option value="1953">1953</option>
								<option value="1952">1952</option>
								<option value="1951">1951</option>
								<option value="1950">1950</option>
								<option value="1949">1949</option>
								<option value="1948">1948</option>
								<option value="1947">1947</option>
								<option value="1946">1946</option>
								<option value="1945">1945</option>
								<option value="1944">1944</option>
								<option value="1943">1943</option>
								<option value="1942">1942</option>
								<option value="1941">1941</option>
								<option value="1940">1940</option>
								<option value="1939">1939</option>
								<option value="1938">1938</option>
								<option value="1937">1937</option>
								<option value="1936">1936</option>
								<option value="1935">1935</option>
								<option value="1934">1934</option>
								<option value="1933">1933</option>
								<option value="1932">1932</option>
								<option value="1931">1931</option>
								<option value="1930">1930</option>
							</select>
						</div>
					</div>
				</div>
				
				<!--country input-->
				<div class="form-group">
					<select id="country" name="u_location" class="form-control"> 
						<option value="Afganistan">Afghanistan</option>
						<option value="Albania">Albania</option>
						<option value="Algeria">Algeria</option>
						<option value="American Samoa">American Samoa</option>
						<option value="Andorra">Andorra</option>
						<option value="Angola">Angola</option>
						<option value="Anguilla">Anguilla</option>
						<option value="Antigua & Barbuda">Antigua & Barbuda</option>
						<option value="Argentina">Argentina</option>
						<option value="Armenia">Armenia</option>
						<option value="Aruba">Aruba</option>
						<option value="Australia">Australia</option>
						<option value="Austria">Austria</option>
						<option value="Azerbaijan">Azerbaijan</option>
						<option value="Bahamas">Bahamas</option>
						<option value="Bahrain">Bahrain</option>
						<option value="Bangladesh">Bangladesh</option>
						<option value="Barbados">Barbados</option>
						<option value="Belarus">Belarus</option>
						<option value="Belgium">Belgium</option>
						<option value="Belize">Belize</option>
						<option value="Benin">Benin</option>
						<option value="Bermuda">Bermuda</option>
						<option value="Bhutan">Bhutan</option>
						<option value="Bolivia">Bolivia</option>
						<option value="Bonaire">Bonaire</option>
						<option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
						<option value="Botswana">Botswana</option>
						<option value="Brazil">Brazil</option>
						<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
						<option value="Brunei">Brunei</option>
						<option value="Bulgaria">Bulgaria</option>
						<option value="Burkina Faso">Burkina Faso</option>
						<option value="Burundi">Burundi</option>
						<option value="Cambodia">Cambodia</option>
						<option value="Cameroon">Cameroon</option>
						<option value="Canada">Canada</option>
						<option value="Canary Islands">Canary Islands</option>
						<option value="Cape Verde">Cape Verde</option>
						<option value="Cayman Islands">Cayman Islands</option>
						<option value="Central African Republic">Central African Republic</option>
						<option value="Chad">Chad</option>
						<option value="Channel Islands">Channel Islands</option>
						<option value="Chile">Chile</option>
						<option value="China">China</option>
						<option value="Christmas Island">Christmas Island</option>
						<option value="Cocos Island">Cocos Island</option>
						<option value="Colombia">Colombia</option>
						<option value="Comoros">Comoros</option>
						<option value="Congo">Congo</option>
						<option value="Cook Islands">Cook Islands</option>
						<option value="Costa Rica">Costa Rica</option>
						<option value="Cote DIvoire">Cote DIvoire</option>
						<option value="Croatia">Croatia</option>
						<option value="Cuba">Cuba</option>
						<option value="Curaco">Curacao</option>
						<option value="Cyprus">Cyprus</option>
						<option value="Czech Republic">Czech Republic</option>
						<option value="Denmark">Denmark</option>
						<option value="Djibouti">Djibouti</option>
						<option value="Dominica">Dominica</option>
						<option value="Dominican Republic">Dominican Republic</option>
						<option value="East Timor">East Timor</option>
						<option value="Ecuador">Ecuador</option>
						<option value="Egypt">Egypt</option>
						<option value="El Salvador">El Salvador</option>
						<option value="Equatorial Guinea">Equatorial Guinea</option>
						<option value="Eritrea">Eritrea</option>
						<option value="Estonia">Estonia</option>
						<option value="Ethiopia">Ethiopia</option>
						<option value="Falkland Islands">Falkland Islands</option>
						<option value="Faroe Islands">Faroe Islands</option>
						<option value="Fiji">Fiji</option>
						<option value="Finland">Finland</option>
						<option value="France">France</option>
						<option value="French Guiana">French Guiana</option>
						<option value="French Polynesia">French Polynesia</option>
						<option value="French Southern Ter">French Southern Ter</option>
						<option value="Gabon">Gabon</option>
						<option value="Gambia">Gambia</option>
						<option value="Georgia">Georgia</option>
						<option value="Germany">Germany</option>
						<option value="Ghana">Ghana</option>
						<option value="Gibraltar">Gibraltar</option>
						<option value="Great Britain">Great Britain</option>
						<option value="Greece">Greece</option>
						<option value="Greenland">Greenland</option>
						<option value="Grenada">Grenada</option>
						<option value="Guadeloupe">Guadeloupe</option>
						<option value="Guam">Guam</option>
						<option value="Guatemala">Guatemala</option>
						<option value="Guinea">Guinea</option>
						<option value="Guyana">Guyana</option>
						<option value="Haiti">Haiti</option>
						<option value="Hawaii">Hawaii</option>
						<option value="Honduras">Honduras</option>
						<option value="Hong Kong">Hong Kong</option>
						<option value="Hungary">Hungary</option>
						<option value="Iceland">Iceland</option>
						<option value="Indonesia">Indonesia</option>
						<option value="India">India</option>
						<option value="Iran">Iran</option>
						<option value="Iraq">Iraq</option>
						<option value="Ireland">Ireland</option>
						<option value="Isle of Man">Isle of Man</option>
						<option value="Italy">Italy</option>
						<option value="Jamaica">Jamaica</option>
						<option value="Japan">Japan</option>
						<option value="Jordan">Jordan</option>
						<option value="Kazakhstan">Kazakhstan</option>
						<option value="Kenya">Kenya</option>
						<option value="Kiribati">Kiribati</option>
						<option value="Korea North">Korea North</option>
						<option value="Korea Sout">Korea South</option>
						<option value="Kuwait">Kuwait</option>
						<option value="Kyrgyzstan">Kyrgyzstan</option>
						<option value="Laos">Laos</option>
						<option value="Latvia">Latvia</option>
						<option value="Lebanon">Lebanon</option>
						<option value="Lesotho">Lesotho</option>
						<option value="Liberia">Liberia</option>
						<option value="Libya">Libya</option>
						<option value="Liechtenstein">Liechtenstein</option>
						<option value="Lithuania">Lithuania</option>
						<option value="Luxembourg">Luxembourg</option>
						<option value="Macau">Macau</option>
						<option value="Macedonia">Macedonia</option>
						<option value="Madagascar">Madagascar</option>
						<option value="Malaysia">Malaysia</option>
						<option value="Malawi">Malawi</option>
						<option value="Maldives">Maldives</option>
						<option value="Mali">Mali</option>
						<option value="Malta">Malta</option>
						<option value="Marshall Islands">Marshall Islands</option>
						<option value="Martinique">Martinique</option>
						<option value="Mauritania">Mauritania</option>
						<option value="Mauritius">Mauritius</option>
						<option value="Mayotte">Mayotte</option>
						<option value="Mexico">Mexico</option>
						<option value="Midway Islands">Midway Islands</option>
						<option value="Moldova">Moldova</option>
						<option value="Monaco">Monaco</option>
						<option value="Mongolia">Mongolia</option>
						<option value="Montserrat">Montserrat</option>
						<option value="Morocco">Morocco</option>
						<option value="Mozambique">Mozambique</option>
						<option value="Myanmar">Myanmar</option>
						<option value="Nambia">Nambia</option>
						<option value="Nauru">Nauru</option>
						<option value="Nepal">Nepal</option>
						<option value="Netherland Antilles">Netherland Antilles</option>
						<option value="Netherlands">Netherlands (Holland, Europe)</option>
						<option value="Nevis">Nevis</option>
						<option value="New Caledonia">New Caledonia</option>
						<option value="New Zealand">New Zealand</option>
						<option value="Nicaragua">Nicaragua</option>
						<option value="Niger">Niger</option>
						<option value="Nigeria">Nigeria</option>
						<option value="Niue">Niue</option>
						<option value="Norfolk Island">Norfolk Island</option>
						<option value="Norway">Norway</option>
						<option value="Oman">Oman</option>
						<option value="Pakistan">Pakistan</option>
						<option value="Palau Island">Palau Island</option>
						<option value="Palestine">Palestine</option>
						<option value="Panama">Panama</option>
						<option value="Papua New Guinea">Papua New Guinea</option>
						<option value="Paraguay">Paraguay</option>
						<option value="Peru">Peru</option>
						<option value="Phillipines">Philippines</option>
						<option value="Pitcairn Island">Pitcairn Island</option>
						<option value="Poland">Poland</option>
						<option value="Portugal">Portugal</option>
						<option value="Puerto Rico">Puerto Rico</option>
						<option value="Qatar">Qatar</option>
						<option value="Republic of Montenegro">Republic of Montenegro</option>
						<option value="Republic of Serbia">Republic of Serbia</option>
						<option value="Reunion">Reunion</option>
						<option value="Romania">Romania</option>
						<option value="Russia">Russia</option>
						<option value="Rwanda">Rwanda</option>
						<option value="St Barthelemy">St Barthelemy</option>
						<option value="St Eustatius">St Eustatius</option>
						<option value="St Helena">St Helena</option>
						<option value="St Kitts-Nevis">St Kitts-Nevis</option>
						<option value="St Lucia">St Lucia</option>
						<option value="St Maarten">St Maarten</option>
						<option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
						<option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
						<option value="Saipan">Saipan</option>
						<option value="Samoa">Samoa</option>
						<option value="Samoa American">Samoa American</option>
						<option value="San Marino">San Marino</option>
						<option value="Sao Tome & Principe">Sao Tome & Principe</option>
						<option value="Saudi Arabia">Saudi Arabia</option>
						<option value="Senegal">Senegal</option>
						<option value="Seychelles">Seychelles</option>
						<option value="Sierra Leone">Sierra Leone</option>
						<option value="Singapore">Singapore</option>
						<option value="Slovakia">Slovakia</option>
						<option value="Slovenia">Slovenia</option>
						<option value="Solomon Islands">Solomon Islands</option>
						<option value="Somalia">Somalia</option>
						<option value="South Africa">South Africa</option>
						<option value="Spain">Spain</option>
						<option value="Sri Lanka">Sri Lanka</option>
						<option value="Sudan">Sudan</option>
						<option value="Suriname">Suriname</option>
						<option value="Swaziland">Swaziland</option>
						<option value="Sweden">Sweden</option>
						<option value="Switzerland">Switzerland</option>
						<option value="Syria">Syria</option>
						<option value="Tahiti">Tahiti</option>
						<option value="Taiwan">Taiwan</option>
						<option value="Tajikistan">Tajikistan</option>
						<option value="Tanzania">Tanzania</option>
						<option value="Thailand">Thailand</option>
						<option value="Togo">Togo</option>
						<option value="Tokelau">Tokelau</option>
						<option value="Tonga">Tonga</option>
						<option value="Trinidad & Tobago">Trinidad & Tobago</option>
						<option value="Tunisia">Tunisia</option>
						<option value="Turkey">Turkey</option>
						<option value="Turkmenistan">Turkmenistan</option>
						<option value="Turks & Caicos Is">Turks & Caicos Is</option>
						<option value="Tuvalu">Tuvalu</option>
						<option value="Uganda">Uganda</option>
						<option value="United Kingdom">United Kingdom</option>
						<option value="Ukraine">Ukraine</option>
						<option value="United Arab Erimates">United Arab Emirates</option>
						<option value="United States of America">United States of America</option>
						<option value="Uraguay">Uruguay</option>
						<option value="Uzbekistan">Uzbekistan</option>
						<option value="Vanuatu">Vanuatu</option>
						<option value="Vatican City State">Vatican City State</option>
						<option value="Venezuela">Venezuela</option>
						<option value="Vietnam">Vietnam</option>
						<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
						<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
						<option value="Wake Island">Wake Island</option>
						<option value="Wallis & Futana Is">Wallis & Futana Is</option>
						<option value="Yemen">Yemen</option>
						<option value="Zaire">Zaire</option>
						<option value="Zambia">Zambia</option>
						<option value="Zimbabwe">Zimbabwe</option>
					</select>
				</div>
				
				<!--gender input-->
				<div class="form-group">
					<label><h5>Gender:</h5></label>
					<input type="radio" id="male" name="u_gender" value="male">
					<label for="male">Male</label>
					<input type="radio" id="female" name="u_gender" value="female">
					<label for="female">Female</label>
				</div>
				
				<!--image input-->
				<div class="form-group">
					<label> User Image </label>
					<input type="file" class="form-control" name="u_image"  accept="image/*" style="padding-bottom: 40px;" required>
				</div>
				
				<!--submit button-->
				<div class="text-center">
					<button type="submit" name="register" class="btn btn-primary">
						<i class="fa fa-users"></i> Register
					</button>
				</div>
			</form>
		</div>
		
		<div class="text-center log">
			Already have an account? 
			<a href="index.php">Login here</a>
		</div>
		
		<script src="js/jquery.min.js"> </script>
		<script src="js/bootstrap.min.js"></script>
		
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
				$('#email').blur(function(){
					var email = $('#email').val();
					if (IsEmail(email) == false){
						$('#sign-up').attr('disabled', true);
						$('#popover-email').removeClass('hide');
					}else{
						$('#popover-email').addClass('hide');
					}
				});
				
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

				function IsEmail(email) {
					var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					if (!regex.test(email)) {
						return false;
					}else{
						return true;
					}
				}

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
	if(isset($_POST['register'])){
		$u_name = $_POST['u_name'];
		$u_email = $_POST['u_email'];
		$u_username = $_POST['u_username'];
		$u_pass = $_POST['u_pass'];
		$u_pass2 = md5($u_pass);
		
		$u_confirm_password=$_POST['u_confirm_password'];
		
		
		$month=$_POST['Month'];
		$dt=$_POST['Day'];
		$year=$_POST['Year'];
		$date_value="$month/$dt/$year";
		
		$u_location = $_POST['u_location'];
		$u_gender = $_POST['u_gender'];
		
		$u_image = $_FILES['u_image']['name'];
		$u_image_tmp = $_FILES['u_image']['tmp_name'];
		
		
		$get_email = "select * from user where u_email='$u_email'";
		$run_email = mysqli_query($con,$get_email);
		$check_email = mysqli_num_rows($run_email);
		
		$get_username = "select * from user where u_username='$u_username'";
		$run_username = mysqli_query($con,$get_username);
		$check_username = mysqli_num_rows($run_username);
		
		$uppercase = preg_match('@[A-Z]@', $u_pass);
		$lowercase = preg_match('@[a-z]@', $u_pass);
		$number    = preg_match('@[0-9]@', $u_pass);
		$specialChars = preg_match('@[^\w]@', $u_pass);
		
		
		if($check_email == 1){
			echo "<script>alert('This email is already registered, try another one')</script>";
		}elseif($check_username == 1){
			echo "<script>alert('This username is already registered, try another one')</script>";
		}elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($u_pass) < 8) {
			echo "<script>alert('Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters')</script>";
		}elseif($u_pass != $u_confirm_password){
			echo"<script>alert('Your Password does not match');</script>";
		}else{
			$insert_user = "insert into user (u_name, u_email, u_username, u_pass, u_birthday, u_location, u_gender, u_image) values ('$u_name','$u_email','$u_username','$u_pass2','$date_value','$u_location','$u_gender','$u_username.png')";
			$run_user = mysqli_query($con,$insert_user);
			$_SESSION['u_email']=$u_email;
			move_uploaded_file($u_image_tmp,"user_images/$u_username.png");
			echo "<script>alert('You have been Registered Successfully')</script>";
			echo "<script>window.open('blog.php','_self')</script>";
		}
		
	}
?>