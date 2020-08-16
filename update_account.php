<?php
	session_start();
	include("includes/db.php");
?>

<?php
	$user_session = $_SESSION['u_email'];
	$get_user = "select * from user where u_email='$user_session'";
	$run_user = mysqli_query($con,$get_user);
	$row_user = mysqli_fetch_array($run_user);
	$u_id = $row_user['u_id'];
	$u_name = $row_user['u_name'];
	$u_email = $row_user['u_email'];
	$u_username = $row_user['u_username'];

	$u_birth = $row_user['u_birthday'];
	$birth = explode("/",$u_birth);

	$u_location = $row_user['u_location'];
	$u_gender = $row_user['u_gender'];
	$u_image = $row_user['u_image'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Discuss the knot - Edit Account</title>
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
					<h2>Edit Account</h2>
				</div>
				
				<hr>
				
				<!--name input-->
				<div class="form-group">
					<input type="text" class="form-control" name="u_name" required="required" value="<?php echo $u_name; ?>">       	
				</div>
				
				<!--email input-->
				<div class="form-group">
					<label>Email:</label>
					<input type="email" class="form-control" name="u_email" required="required" value="<?php echo $u_email; ?>" readonly>
				</div>
				
				<!--username input-->
				<div class="form-group">
					<label>Username:</label>
					<input type="input" class="form-control" name="u_username" required="required" value="<?php echo $u_username; ?>" readonly>
				</div>
				
				<!--birthday input-->
				<div class="form-group">
					<div class="row">
						<div class="col-sm-4 col-xs-4">
							<select name="Day" class="form-control">
								<option>-Day-</option>
								<option <?php if($birth[1]== '1') echo 'selected'; ?> value="1">1</option>
								<option <?php if($birth[1]== '2') echo 'selected'; ?> value="2">2</option>
								<option <?php if($birth[1]== '3') echo 'selected'; ?> value="3">3</option>
								<option <?php if($birth[1]== '4') echo 'selected'; ?> value="4">4</option>
								<option <?php if($birth[1]== '5') echo 'selected'; ?> value="5">5</option>
								<option <?php if($birth[1]== '6') echo 'selected'; ?> value="6">6</option>
								<option <?php if($birth[1]== '7') echo 'selected'; ?> value="7">7</option>
								<option <?php if($birth[1]== '8') echo 'selected'; ?> value="8">8</option>
								<option <?php if($birth[1]== '9') echo 'selected'; ?> value="9">9</option>
								<option <?php if($birth[1]== '10') echo 'selected'; ?> value="10">10</option>
								<option <?php if($birth[1]== '11') echo 'selected'; ?> value="11">11</option>
								<option <?php if($birth[1]== '12') echo 'selected'; ?> value="12">12</option>
								<option <?php if($birth[1]== '13') echo 'selected'; ?> value="13">13</option>
								<option <?php if($birth[1]== '14') echo 'selected'; ?> value="14">14</option>
								<option <?php if($birth[1]== '15') echo 'selected'; ?> value="15">15</option>
								<option <?php if($birth[1]== '16') echo 'selected'; ?> value="16">16</option>
								<option <?php if($birth[1]== '17') echo 'selected'; ?> value="17">17</option>
								<option <?php if($birth[1]== '18') echo 'selected'; ?> value="18">18</option>
								<option <?php if($birth[1]== '19') echo 'selected'; ?> value="19">19</option>
								<option <?php if($birth[1]== '20') echo 'selected'; ?> value="20">20</option>
								<option <?php if($birth[1]== '21') echo 'selected'; ?> value="21">21</option>
								<option <?php if($birth[1]== '22') echo 'selected'; ?> value="22">22</option>
								<option <?php if($birth[1]== '23') echo 'selected'; ?> value="23">23</option>
								<option <?php if($birth[1]== '24') echo 'selected'; ?> value="24">24</option>
								<option <?php if($birth[1]== '25') echo 'selected'; ?> value="25">25</option>
								<option <?php if($birth[1]== '26') echo 'selected'; ?> value="26">26</option>
								<option <?php if($birth[1]== '27') echo 'selected'; ?> value="27">27</option>
								<option <?php if($birth[1]== '28') echo 'selected'; ?> value="28">28</option>
								<option <?php if($birth[1]== '29') echo 'selected'; ?> value="29">29</option>
								<option <?php if($birth[1]== '30') echo 'selected'; ?> value="30">30</option>
								<option <?php if($birth[1]== '31') echo 'selected'; ?> value="31">31</option>
							</select>
						</div>
						<div class="col-sm-4 col-xs-4">
							<select name="Month" class="form-control">
								<option>-Month-</option>
								<option <?php if($birth[0]== 'January') echo 'selected'; ?> value="January">January</option>
								<option <?php if($birth[0]== 'Febuary') echo 'selected'; ?> value="Febuary">Febuary</option>
								<option <?php if($birth[0]== 'March') echo 'selected'; ?> value="March">March</option>
								<option <?php if($birth[0]== 'April') echo 'selected'; ?> value="April">April</option>
								<option <?php if($birth[0]== 'May') echo 'selected'; ?> value="May">May</option>
								<option <?php if($birth[0]== 'June') echo 'selected'; ?> value="June">June</option>
								<option <?php if($birth[0]== 'July') echo 'selected'; ?> value="July">July</option>
								<option <?php if($birth[0]== 'August') echo 'selected'; ?> value="August">August</option>
								<option <?php if($birth[0]== 'September') echo 'selected'; ?> value="September">September</option>
								<option <?php if($birth[0]== 'October') echo 'selected'; ?> value="October">October</option>
								<option <?php if($birth[0]== 'November') echo 'selected'; ?> value="November">November</option>
								<option <?php if($birth[0]== 'December') echo 'selected'; ?> value="December">December</option>
							</select>
						</div>
						<div class="col-sm-4 col-xs-4">
							<select name="Year" class="form-control">
								<option>-Year-</option>
								<option <?php if($birth[2]== '2020') echo 'selected'; ?> value="2020">2020</option>
								<option <?php if($birth[2]== '2019') echo 'selected'; ?> value="2019">2019</option>
								<option <?php if($birth[2]== '2018') echo 'selected'; ?> value="2018">2018</option>
								<option <?php if($birth[2]== '2017') echo 'selected'; ?> value="2017">2017</option>
								<option <?php if($birth[2]== '2016') echo 'selected'; ?> value="2016">2016</option>
								<option <?php if($birth[2]== '2015') echo 'selected'; ?> value="2015">2015</option>
								<option <?php if($birth[2]== '2014') echo 'selected'; ?> value="2014">2014</option>
								<option <?php if($birth[2]== '2013') echo 'selected'; ?> value="2013">2013</option>
								<option <?php if($birth[2]== '2012') echo 'selected'; ?> value="2012">2012</option>
								<option <?php if($birth[2]== '2011') echo 'selected'; ?> value="2011">2011</option>
								<option <?php if($birth[2]== '2010') echo 'selected'; ?> value="2010">2010</option>
								<option <?php if($birth[2]== '2009') echo 'selected'; ?> value="2009">2009</option>
								<option <?php if($birth[2]== '2008') echo 'selected'; ?> value="2008">2008</option>
								<option <?php if($birth[2]== '2007') echo 'selected'; ?> value="2007">2007</option>
								<option <?php if($birth[2]== '2006') echo 'selected'; ?> value="2006">2006</option>
								<option <?php if($birth[2]== '2005') echo 'selected'; ?> value="2005">2005</option>
								<option <?php if($birth[2]== '2004') echo 'selected'; ?> value="2004">2004</option>
								<option <?php if($birth[2]== '2003') echo 'selected'; ?> value="2003">2003</option>
								<option <?php if($birth[2]== '2002') echo 'selected'; ?> value="2002">2002</option>
								<option <?php if($birth[2]== '2001') echo 'selected'; ?> value="2001">2001</option>
								<option <?php if($birth[2]== '2000') echo 'selected'; ?> value="2000">2000</option>
								<option <?php if($birth[2]== '1999') echo 'selected'; ?> value="1999">1999</option>
								<option <?php if($birth[2]== '1998') echo 'selected'; ?> value="1998">1998</option>
								<option <?php if($birth[2]== '1997') echo 'selected'; ?> value="1997">1997</option>
								<option <?php if($birth[2]== '1996') echo 'selected'; ?> value="1996">1996</option>
								<option <?php if($birth[2]== '1995') echo 'selected'; ?> value="1995">1995</option>
								<option <?php if($birth[2]== '1994') echo 'selected'; ?> value="1994">1994</option>
								<option <?php if($birth[2]== '1993') echo 'selected'; ?> value="1993">1993</option>
								<option <?php if($birth[2]== '1992') echo 'selected'; ?> value="1992">1992</option>
								<option <?php if($birth[2]== '1991') echo 'selected'; ?> value="1991">1991</option>
								<option <?php if($birth[2]== '1990') echo 'selected'; ?> value="1990">1990</option>
								<option <?php if($birth[2]== '1989') echo 'selected'; ?> value="1989">1989</option>
								<option <?php if($birth[2]== '1988') echo 'selected'; ?> value="1988">1988</option>
								<option <?php if($birth[2]== '1987') echo 'selected'; ?> value="1987">1987</option>
								<option <?php if($birth[2]== '1986') echo 'selected'; ?> value="1986">1986</option>
								<option <?php if($birth[2]== '1985') echo 'selected'; ?> value="1985">1985</option>
								<option <?php if($birth[2]== '1984') echo 'selected'; ?> value="1984">1984</option>
								<option <?php if($birth[2]== '1983') echo 'selected'; ?> value="1983">1983</option>
								<option <?php if($birth[2]== '1982') echo 'selected'; ?> value="1982">1982</option>
								<option <?php if($birth[2]== '1981') echo 'selected'; ?> value="1981">1981</option>
								<option <?php if($birth[2]== '1980') echo 'selected'; ?> value="1980">1980</option>
								<option <?php if($birth[2]== '1979') echo 'selected'; ?> value="1979">1979</option>
								<option <?php if($birth[2]== '1978') echo 'selected'; ?> value="1978">1978</option>
								<option <?php if($birth[2]== '1977') echo 'selected'; ?> value="1977">1977</option>
								<option <?php if($birth[2]== '1976') echo 'selected'; ?> value="1976">1976</option>
								<option <?php if($birth[2]== '1975') echo 'selected'; ?> value="1975">1975</option>
								<option <?php if($birth[2]== '1974') echo 'selected'; ?> value="1974">1974</option>
								<option <?php if($birth[2]== '1973') echo 'selected'; ?> value="1973">1973</option>
								<option <?php if($birth[2]== '1972') echo 'selected'; ?> value="1972">1972</option>
								<option <?php if($birth[2]== '1971') echo 'selected'; ?> value="1971">1971</option>
								<option <?php if($birth[2]== '1970') echo 'selected'; ?> value="1970">1970</option>
								<option <?php if($birth[2]== '1969') echo 'selected'; ?> value="1969">1969</option>
								<option <?php if($birth[2]== '1968') echo 'selected'; ?> value="1968">1968</option>
								<option <?php if($birth[2]== '1967') echo 'selected'; ?> value="1967">1967</option>
								<option <?php if($birth[2]== '1966') echo 'selected'; ?> value="1966">1966</option>
								<option <?php if($birth[2]== '1965') echo 'selected'; ?> value="1965">1965</option>
								<option <?php if($birth[2]== '1964') echo 'selected'; ?> value="1964">1964</option>
								<option <?php if($birth[2]== '1963') echo 'selected'; ?> value="1963">1963</option>
								<option <?php if($birth[2]== '1962') echo 'selected'; ?> value="1962">1962</option>
								<option <?php if($birth[2]== '1961') echo 'selected'; ?> value="1961">1961</option>
								<option <?php if($birth[2]== '1960') echo 'selected'; ?> value="1960">1960</option>
								<option <?php if($birth[2]== '1959') echo 'selected'; ?> value="1959">1959</option>
								<option <?php if($birth[2]== '1958') echo 'selected'; ?> value="1958">1958</option>
								<option <?php if($birth[2]== '1957') echo 'selected'; ?> value="1957">1957</option>
								<option <?php if($birth[2]== '1956') echo 'selected'; ?> value="1956">1956</option>
								<option <?php if($birth[2]== '1955') echo 'selected'; ?> value="1955">1955</option>
								<option <?php if($birth[2]== '1954') echo 'selected'; ?> value="1954">1954</option>
								<option <?php if($birth[2]== '1953') echo 'selected'; ?> value="1953">1953</option>
								<option <?php if($birth[2]== '1952') echo 'selected'; ?> value="1952">1952</option>
								<option <?php if($birth[2]== '1951') echo 'selected'; ?> value="1951">1951</option>
								<option <?php if($birth[2]== '1950') echo 'selected'; ?> value="1950">1950</option>
								<option <?php if($birth[2]== '1949') echo 'selected'; ?> value="1949">1949</option>
								<option <?php if($birth[2]== '1948') echo 'selected'; ?> value="1948">1948</option>
								<option <?php if($birth[2]== '1947') echo 'selected'; ?> value="1947">1947</option>
								<option <?php if($birth[2]== '1946') echo 'selected'; ?> value="1946">1946</option>
								<option <?php if($birth[2]== '1945') echo 'selected'; ?> value="1945">1945</option>
								<option <?php if($birth[2]== '1944') echo 'selected'; ?> value="1944">1944</option>
								<option <?php if($birth[2]== '1943') echo 'selected'; ?> value="1943">1943</option>
								<option <?php if($birth[2]== '1942') echo 'selected'; ?> value="1942">1942</option>
								<option <?php if($birth[2]== '1941') echo 'selected'; ?> value="1941">1941</option>
								<option <?php if($birth[2]== '1940') echo 'selected'; ?> value="1940">1940</option>
								<option <?php if($birth[2]== '1939') echo 'selected'; ?> value="1939">1939</option>
								<option <?php if($birth[2]== '1938') echo 'selected'; ?> value="1938">1938</option>
								<option <?php if($birth[2]== '1937') echo 'selected'; ?> value="1937">1937</option>
								<option <?php if($birth[2]== '1936') echo 'selected'; ?> value="1936">1936</option>
								<option <?php if($birth[2]== '1935') echo 'selected'; ?> value="1935">1935</option>
								<option <?php if($birth[2]== '1934') echo 'selected'; ?> value="1934">1934</option>
								<option <?php if($birth[2]== '1933') echo 'selected'; ?> value="1933">1933</option>
								<option <?php if($birth[2]== '1932') echo 'selected'; ?> value="1932">1932</option>
								<option <?php if($birth[2]== '1931') echo 'selected'; ?> value="1931">1931</option>
								<option <?php if($birth[2]== '1930') echo 'selected'; ?> value="1930">1930</option>
							</select>
						</div>
					</div>
				</div>
				
				<!--country input-->
				<div class="form-group">
					<select id="country" name="u_location" class="form-control"> 
						<option <?php if($u_location == 'Afganistan') echo 'selected'; ?> value="Afganistan">Afghanistan</option>
						<option <?php if($u_location == 'Albania') echo 'selected'; ?> value="Albania">Albania</option>
						<option <?php if($u_location == 'Algeria') echo 'selected'; ?> value="Algeria">Algeria</option>
						<option <?php if($u_location == 'American Samoa') echo 'selected'; ?> value="American Samoa">American Samoa</option>
						<option <?php if($u_location == 'Andorra') echo 'selected'; ?> value="Andorra">Andorra</option>
						<option <?php if($u_location == 'Angola') echo 'selected'; ?> value="Angola">Angola</option>
						<option <?php if($u_location == 'Anguilla') echo 'selected'; ?> value="Anguilla">Anguilla</option>
						<option <?php if($u_location == 'Antigua & Barbuda') echo 'selected'; ?> value="Antigua & Barbuda">Antigua & Barbuda</option>
						<option <?php if($u_location == 'Argentina') echo 'selected'; ?> value="Argentina">Argentina</option>
						<option <?php if($u_location == 'Armenia') echo 'selected'; ?> value="Armenia">Armenia</option>
						<option <?php if($u_location == 'Aruba') echo 'selected'; ?> value="Aruba">Aruba</option>
						<option <?php if($u_location == 'Australia') echo 'selected'; ?> value="Australia">Australia</option>
						<option <?php if($u_location == 'Austria') echo 'selected'; ?> value="Austria">Austria</option>
						<option <?php if($u_location == 'Azerbaijan') echo 'selected'; ?> value="Azerbaijan">Azerbaijan</option>
						<option <?php if($u_location == 'Bahamas') echo 'selected'; ?> value="Bahamas">Bahamas</option>
						<option <?php if($u_location == 'Bahrain') echo 'selected'; ?> value="Bahrain">Bahrain</option>
						<option <?php if($u_location == 'Bangladesh') echo 'selected'; ?> value="Bangladesh">Bangladesh</option>
						<option <?php if($u_location == 'Barbados') echo 'selected'; ?> value="Barbados">Barbados</option>
						<option <?php if($u_location == 'Belarus') echo 'selected'; ?> value="Belarus">Belarus</option>
						<option <?php if($u_location == 'Belgium') echo 'selected'; ?> value="Belgium">Belgium</option>
						<option <?php if($u_location == 'Belize') echo 'selected'; ?> value="Belize">Belize</option>
						<option <?php if($u_location == 'Benin') echo 'selected'; ?> value="Benin">Benin</option>
						<option <?php if($u_location == 'Bermuda') echo 'selected'; ?> value="Bermuda">Bermuda</option>
						<option <?php if($u_location == 'Bhutan') echo 'selected'; ?> value="Bhutan">Bhutan</option>
						<option <?php if($u_location == 'Bolivia') echo 'selected'; ?> value="Bolivia">Bolivia</option>
						<option <?php if($u_location == 'Bonaire') echo 'selected'; ?> value="Bonaire">Bonaire</option>
						<option <?php if($u_location == 'Bosnia & Herzegovina') echo 'selected'; ?> value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
						<option <?php if($u_location == 'Botswana') echo 'selected'; ?> value="Botswana">Botswana</option>
						<option <?php if($u_location == 'Brazil') echo 'selected'; ?> value="Brazil">Brazil</option>
						<option <?php if($u_location == 'British Indian Ocean Ter') echo 'selected'; ?> value="British Indian Ocean Ter">British Indian Ocean Ter</option>
						<option <?php if($u_location == 'Brunei') echo 'selected'; ?> value="Brunei">Brunei</option>
						<option <?php if($u_location == 'Bulgaria') echo 'selected'; ?> value="Bulgaria">Bulgaria</option>
						<option <?php if($u_location == 'Burkina Faso') echo 'selected'; ?> value="Burkina Faso">Burkina Faso</option>
						<option <?php if($u_location == 'Burundi') echo 'selected'; ?> value="Burundi">Burundi</option>
						<option <?php if($u_location == 'Cambodia') echo 'selected'; ?> value="Cambodia">Cambodia</option>
						<option <?php if($u_location == 'Cameroon') echo 'selected'; ?> value="Cameroon">Cameroon</option>
						<option <?php if($u_location == 'Canada') echo 'selected'; ?> value="Canada">Canada</option>
						<option <?php if($u_location == 'Canary Islands') echo 'selected'; ?> value="Canary Islands">Canary Islands</option>
						<option <?php if($u_location == 'Cape Verde') echo 'selected'; ?> value="Cape Verde">Cape Verde</option>
						<option <?php if($u_location == 'Cayman Islands') echo 'selected'; ?> value="Cayman Islands">Cayman Islands</option>
						<option <?php if($u_location == 'Central African Republic') echo 'selected'; ?> value="Central African Republic">Central African Republic</option>
						<option <?php if($u_location == 'Chad') echo 'selected'; ?> value="Chad">Chad</option>
						<option <?php if($u_location == 'Channel Islands') echo 'selected'; ?> value="Channel Islands">Channel Islands</option>
						<option <?php if($u_location == 'Chile') echo 'selected'; ?> value="Chile">Chile</option>
						<option <?php if($u_location == 'China') echo 'selected'; ?> value="China">China</option>
						<option <?php if($u_location == 'Christmas Island') echo 'selected'; ?> value="Christmas Island">Christmas Island</option>
						<option <?php if($u_location == 'Cocos Island') echo 'selected'; ?> value="Cocos Island">Cocos Island</option>
						<option <?php if($u_location == 'Colombia') echo 'selected'; ?> value="Colombia">Colombia</option>
						<option <?php if($u_location == 'Comoros') echo 'selected'; ?> value="Comoros">Comoros</option>
						<option <?php if($u_location == 'Congo') echo 'selected'; ?> value="Congo">Congo</option>
						<option <?php if($u_location == 'Cook Islands') echo 'selected'; ?> value="Cook Islands">Cook Islands</option>
						<option <?php if($u_location == 'Costa Rica') echo 'selected'; ?> value="Costa Rica">Costa Rica</option>
						<option <?php if($u_location == 'Cote DIvoire') echo 'selected'; ?> value="Cote DIvoire">Cote DIvoire</option>
						<option <?php if($u_location == 'Croatia') echo 'selected'; ?> value="Croatia">Croatia</option>
						<option <?php if($u_location == 'Cuba') echo 'selected'; ?> value="Cuba">Cuba</option>
						<option <?php if($u_location == 'Curaco') echo 'selected'; ?> value="Curaco">Curacao</option>
						<option <?php if($u_location == 'Cyprus') echo 'selected'; ?> value="Cyprus">Cyprus</option>
						<option <?php if($u_location == 'Czech Republic') echo 'selected'; ?> value="Czech Republic">Czech Republic</option>
						<option <?php if($u_location == 'Denmark') echo 'selected'; ?> value="Denmark">Denmark</option>
						<option <?php if($u_location == 'Djibouti') echo 'selected'; ?> value="Djibouti">Djibouti</option>
						<option <?php if($u_location == 'Dominica') echo 'selected'; ?> value="Dominica">Dominica</option>
						<option <?php if($u_location == 'Dominican Republic') echo 'selected'; ?> value="Dominican Republic">Dominican Republic</option>
						<option <?php if($u_location == 'East Timor') echo 'selected'; ?> value="East Timor">East Timor</option>
						<option <?php if($u_location == 'Ecuador') echo 'selected'; ?> value="Ecuador">Ecuador</option>
						<option <?php if($u_location == 'Egypt') echo 'selected'; ?> value="Egypt">Egypt</option>
						<option <?php if($u_location == 'El Salvador') echo 'selected'; ?> value="El Salvador">El Salvador</option>
						<option <?php if($u_location == 'Equatorial Guinea') echo 'selected'; ?> value="Equatorial Guinea">Equatorial Guinea</option>
						<option <?php if($u_location == 'Eritrea') echo 'selected'; ?> value="Eritrea">Eritrea</option>
						<option <?php if($u_location == 'Estonia') echo 'selected'; ?> value="Estonia">Estonia</option>
						<option <?php if($u_location == 'Ethiopia') echo 'selected'; ?> value="Ethiopia">Ethiopia</option>
						<option <?php if($u_location == 'Falkland Islands') echo 'selected'; ?> value="Falkland Islands">Falkland Islands</option>
						<option <?php if($u_location == 'Faroe Islands') echo 'selected'; ?> value="Faroe Islands">Faroe Islands</option>
						<option <?php if($u_location == 'Fiji') echo 'selected'; ?> value="Fiji">Fiji</option>
						<option <?php if($u_location == 'Finland') echo 'selected'; ?> value="Finland">Finland</option>
						<option <?php if($u_location == 'France') echo 'selected'; ?> value="France">France</option>
						<option <?php if($u_location == 'French Guiana') echo 'selected'; ?> value="French Guiana">French Guiana</option>
						<option <?php if($u_location == 'French Polynesia') echo 'selected'; ?> value="French Polynesia">French Polynesia</option>
						<option <?php if($u_location == 'French Southern Ter') echo 'selected'; ?> value="French Southern Ter">French Southern Ter</option>
						<option <?php if($u_location == 'Gabon') echo 'selected'; ?> value="Gabon">Gabon</option>
						<option <?php if($u_location == 'Gambia') echo 'selected'; ?> value="Gambia">Gambia</option>
						<option <?php if($u_location == 'Georgia') echo 'selected'; ?> value="Georgia">Georgia</option>
						<option <?php if($u_location == 'Germany') echo 'selected'; ?> value="Germany">Germany</option>
						<option <?php if($u_location == 'Ghana') echo 'selected'; ?> value="Ghana">Ghana</option>
						<option <?php if($u_location == 'Gibraltar') echo 'selected'; ?> value="Gibraltar">Gibraltar</option>
						<option <?php if($u_location == 'Great Britain') echo 'selected'; ?> value="Great Britain">Great Britain</option>
						<option <?php if($u_location == 'Greece') echo 'selected'; ?> value="Greece">Greece</option>
						<option <?php if($u_location == 'Greenland') echo 'selected'; ?> value="Greenland">Greenland</option>
						<option <?php if($u_location == 'Grenada') echo 'selected'; ?> value="Grenada">Grenada</option>
						<option <?php if($u_location == 'Guadeloupe') echo 'selected'; ?> value="Guadeloupe">Guadeloupe</option>
						<option <?php if($u_location == 'Guam') echo 'selected'; ?> value="Guam">Guam</option>
						<option <?php if($u_location == 'Guatemala') echo 'selected'; ?> value="Guatemala">Guatemala</option>
						<option <?php if($u_location == 'Guinea') echo 'selected'; ?> value="Guinea">Guinea</option>
						<option <?php if($u_location == 'Guyana') echo 'selected'; ?> value="Guyana">Guyana</option>
						<option <?php if($u_location == 'Haiti') echo 'selected'; ?> value="Haiti">Haiti</option>
						<option <?php if($u_location == 'Hawaii') echo 'selected'; ?> value="Hawaii">Hawaii</option>
						<option <?php if($u_location == 'Honduras') echo 'selected'; ?> value="Honduras">Honduras</option>
						<option <?php if($u_location == 'Hong Kong') echo 'selected'; ?> value="Hong Kong">Hong Kong</option>
						<option <?php if($u_location == 'Hungary') echo 'selected'; ?> value="Hungary">Hungary</option>
						<option <?php if($u_location == 'Iceland') echo 'selected'; ?> value="Iceland">Iceland</option>
						<option <?php if($u_location == 'Indonesia') echo 'selected'; ?> value="Indonesia">Indonesia</option>
						<option <?php if($u_location == 'India') echo 'selected'; ?> value="India">India</option>
						<option <?php if($u_location == 'Iran') echo 'selected'; ?> value="Iran">Iran</option>
						<option <?php if($u_location == 'Iraq') echo 'selected'; ?> value="Iraq">Iraq</option>
						<option <?php if($u_location == 'Ireland') echo 'selected'; ?> value="Ireland">Ireland</option>
						<option <?php if($u_location == 'Isle of Man') echo 'selected'; ?> value="Isle of Man">Isle of Man</option>
						<option <?php if($u_location == 'Italy') echo 'selected'; ?> value="Italy">Italy</option>
						<option <?php if($u_location == 'Jamaica') echo 'selected'; ?> value="Jamaica">Jamaica</option>
						<option <?php if($u_location == 'Japan') echo 'selected'; ?> value="Japan">Japan</option>
						<option <?php if($u_location == 'Jordan') echo 'selected'; ?> value="Jordan">Jordan</option>
						<option <?php if($u_location == 'Kazakhstan') echo 'selected'; ?> value="Kazakhstan">Kazakhstan</option>
						<option <?php if($u_location == 'Kenya') echo 'selected'; ?> value="Kenya">Kenya</option>
						<option <?php if($u_location == 'Kiribati') echo 'selected'; ?> value="Kiribati">Kiribati</option>
						<option <?php if($u_location == 'Korea North') echo 'selected'; ?> value="Korea North">Korea North</option>
						<option <?php if($u_location == 'Korea Sout') echo 'selected'; ?> value="Korea Sout">Korea South</option>
						<option <?php if($u_location == 'Kuwait') echo 'selected'; ?> value="Kuwait">Kuwait</option>
						<option <?php if($u_location == 'Kyrgyzstan') echo 'selected'; ?> value="Kyrgyzstan">Kyrgyzstan</option>
						<option <?php if($u_location == 'Laos') echo 'selected'; ?> value="Laos">Laos</option>
						<option <?php if($u_location == 'Latvia') echo 'selected'; ?> value="Latvia">Latvia</option>
						<option <?php if($u_location == 'Lebanon') echo 'selected'; ?> value="Lebanon">Lebanon</option>
						<option <?php if($u_location == 'Lesotho') echo 'selected'; ?> value="Lesotho">Lesotho</option>
						<option <?php if($u_location == 'Liberia') echo 'selected'; ?> value="Liberia">Liberia</option>
						<option <?php if($u_location == 'Libya') echo 'selected'; ?> value="Libya">Libya</option>
						<option <?php if($u_location == 'Liechtenstein') echo 'selected'; ?> value="Liechtenstein">Liechtenstein</option>
						<option <?php if($u_location == 'Lithuania') echo 'selected'; ?> value="Lithuania">Lithuania</option>
						<option <?php if($u_location == 'Luxembourg') echo 'selected'; ?> value="Luxembourg">Luxembourg</option>
						<option <?php if($u_location == 'Macau') echo 'selected'; ?> value="Macau">Macau</option>
						<option <?php if($u_location == 'Macedonia') echo 'selected'; ?> value="Macedonia">Macedonia</option>
						<option <?php if($u_location == 'Madagascar') echo 'selected'; ?> value="Madagascar">Madagascar</option>
						<option <?php if($u_location == 'Malaysia') echo 'selected'; ?> value="Malaysia">Malaysia</option>
						<option <?php if($u_location == 'Malawi') echo 'selected'; ?> value="Malawi">Malawi</option>
						<option <?php if($u_location == 'Maldives') echo 'selected'; ?> value="Maldives">Maldives</option>
						<option <?php if($u_location == 'Mali') echo 'selected'; ?> value="Mali">Mali</option>
						<option <?php if($u_location == 'Malta') echo 'selected'; ?> value="Malta">Malta</option>
						<option <?php if($u_location == 'Marshall Islands') echo 'selected'; ?> value="Marshall Islands">Marshall Islands</option>
						<option <?php if($u_location == 'Martinique') echo 'selected'; ?> value="Martinique">Martinique</option>
						<option <?php if($u_location == 'Mauritania') echo 'selected'; ?> value="Mauritania">Mauritania</option>
						<option <?php if($u_location == 'Mauritius') echo 'selected'; ?> value="Mauritius">Mauritius</option>
						<option <?php if($u_location == 'Mayotte') echo 'selected'; ?> value="Mayotte">Mayotte</option>
						<option <?php if($u_location == 'Mexico') echo 'selected'; ?> value="Mexico">Mexico</option>
						<option <?php if($u_location == 'Midway Islands') echo 'selected'; ?> value="Midway Islands">Midway Islands</option>
						<option <?php if($u_location == 'Moldova') echo 'selected'; ?> value="Moldova">Moldova</option>
						<option <?php if($u_location == 'Monaco') echo 'selected'; ?> value="Monaco">Monaco</option>
						<option <?php if($u_location == 'Mongolia') echo 'selected'; ?> value="Mongolia">Mongolia</option>
						<option <?php if($u_location == 'Montserrat') echo 'selected'; ?> value="Montserrat">Montserrat</option>
						<option <?php if($u_location == 'Morocco') echo 'selected'; ?> value="Morocco">Morocco</option>
						<option <?php if($u_location == 'Mozambique') echo 'selected'; ?> value="Mozambique">Mozambique</option>
						<option <?php if($u_location == 'Myanmar') echo 'selected'; ?> value="Myanmar">Myanmar</option>
						<option <?php if($u_location == 'Nambia') echo 'selected'; ?> value="Nambia">Nambia</option>
						<option <?php if($u_location == 'Nauru') echo 'selected'; ?> value="Nauru">Nauru</option>
						<option <?php if($u_location == 'Nepal') echo 'selected'; ?> value="Nepal">Nepal</option>
						<option <?php if($u_location == 'Netherland Antilles') echo 'selected'; ?> value="Netherland Antilles">Netherland Antilles</option>
						<option <?php if($u_location == 'Netherlands') echo 'selected'; ?> value="Netherlands">Netherlands (Holland, Europe)</option>
						<option <?php if($u_location == 'Nevis') echo 'selected'; ?> value="Nevis">Nevis</option>
						<option <?php if($u_location == 'New Caledonia') echo 'selected'; ?> value="New Caledonia">New Caledonia</option>
						<option <?php if($u_location == 'New Zealand') echo 'selected'; ?> value="New Zealand">New Zealand</option>
						<option <?php if($u_location == 'Nicaragua') echo 'selected'; ?> value="Nicaragua">Nicaragua</option>
						<option <?php if($u_location == 'Niger') echo 'selected'; ?> value="Niger">Niger</option>
						<option <?php if($u_location == 'Nigeria') echo 'selected'; ?> value="Nigeria">Nigeria</option>
						<option <?php if($u_location == 'Niue') echo 'selected'; ?> value="Niue">Niue</option>
						<option <?php if($u_location == 'Norfolk Island') echo 'selected'; ?> value="Norfolk Island">Norfolk Island</option>
						<option <?php if($u_location == 'Norway') echo 'selected'; ?> value="Norway">Norway</option>
						<option <?php if($u_location == 'Oman') echo 'selected'; ?> value="Oman">Oman</option>
						<option <?php if($u_location == 'Pakistan') echo 'selected'; ?> value="Pakistan">Pakistan</option>
						<option <?php if($u_location == 'Palau Island') echo 'selected'; ?> value="Palau Island">Palau Island</option>
						<option <?php if($u_location == 'Palestine') echo 'selected'; ?> value="Palestine">Palestine</option>
						<option <?php if($u_location == 'Panama') echo 'selected'; ?> value="Panama">Panama</option>
						<option <?php if($u_location == 'Papua New Guinea') echo 'selected'; ?> value="Papua New Guinea">Papua New Guinea</option>
						<option <?php if($u_location == 'Paraguay') echo 'selected'; ?> value="Paraguay">Paraguay</option>
						<option <?php if($u_location == 'Peru') echo 'selected'; ?> value="Peru">Peru</option>
						<option <?php if($u_location == 'Phillipines') echo 'selected'; ?> value="Phillipines">Philippines</option>
						<option <?php if($u_location == 'Pitcairn Island') echo 'selected'; ?> value="Pitcairn Island">Pitcairn Island</option>
						<option <?php if($u_location == 'Poland') echo 'selected'; ?> value="Poland">Poland</option>
						<option <?php if($u_location == 'Portugal') echo 'selected'; ?> value="Portugal">Portugal</option>
						<option <?php if($u_location == 'Puerto Rico') echo 'selected'; ?> value="Puerto Rico">Puerto Rico</option>
						<option <?php if($u_location == 'Qatar') echo 'selected'; ?> value="Qatar">Qatar</option>
						<option <?php if($u_location == 'Republic of Montenegro') echo 'selected'; ?> value="Republic of Montenegro">Republic of Montenegro</option>
						<option <?php if($u_location == 'Republic of Serbia') echo 'selected'; ?> value="Republic of Serbia">Republic of Serbia</option>
						<option <?php if($u_location == 'Reunion') echo 'selected'; ?> value="Reunion">Reunion</option>
						<option <?php if($u_location == 'Romania') echo 'selected'; ?> value="Romania">Romania</option>
						<option <?php if($u_location == 'Russia') echo 'selected'; ?> value="Russia">Russia</option>
						<option <?php if($u_location == 'Rwanda') echo 'selected'; ?> value="Rwanda">Rwanda</option>
						<option <?php if($u_location == 'St Barthelemy') echo 'selected'; ?> value="St Barthelemy">St Barthelemy</option>
						<option <?php if($u_location == 'St Eustatius') echo 'selected'; ?> value="St Eustatius">St Eustatius</option>
						<option <?php if($u_location == 'St Helena') echo 'selected'; ?> value="St Helena">St Helena</option>
						<option <?php if($u_location == 'St Kitts-Nevis') echo 'selected'; ?> value="St Kitts-Nevis">St Kitts-Nevis</option>
						<option <?php if($u_location == 'St Lucia') echo 'selected'; ?> value="St Lucia">St Lucia</option>
						<option <?php if($u_location == 'St Maarten') echo 'selected'; ?> value="St Maarten">St Maarten</option>
						<option <?php if($u_location == 'St Pierre & Miquelon') echo 'selected'; ?> value="St Pierre & Miquelon">St Pierre & Miquelon</option>
						<option <?php if($u_location == 'St Vincent & Grenadines') echo 'selected'; ?> value="St Vincent & Grenadines">St Vincent & Grenadines</option>
						<option <?php if($u_location == 'Saipan') echo 'selected'; ?> value="Saipan">Saipan</option>
						<option <?php if($u_location == 'Samoa') echo 'selected'; ?> value="Samoa">Samoa</option>
						<option <?php if($u_location == 'Samoa American') echo 'selected'; ?> value="Samoa American">Samoa American</option>
						<option <?php if($u_location == 'San Marino') echo 'selected'; ?> value="San Marino">San Marino</option>
						<option <?php if($u_location == 'Sao Tome & Principe') echo 'selected'; ?> value="Sao Tome & Principe">Sao Tome & Principe</option>
						<option <?php if($u_location == 'Saudi Arabia') echo 'selected'; ?> value="Saudi Arabia">Saudi Arabia</option>
						<option <?php if($u_location == 'Senegal') echo 'selected'; ?> value="Senegal">Senegal</option>
						<option <?php if($u_location == 'Seychelles') echo 'selected'; ?> value="Seychelles">Seychelles</option>
						<option <?php if($u_location == 'Sierra Leone') echo 'selected'; ?> value="Sierra Leone">Sierra Leone</option>
						<option <?php if($u_location == 'Singapore') echo 'selected'; ?> value="Singapore">Singapore</option>
						<option <?php if($u_location == 'Slovakia') echo 'selected'; ?> value="Slovakia">Slovakia</option>
						<option <?php if($u_location == 'Slovenia') echo 'selected'; ?> value="Slovenia">Slovenia</option>
						<option <?php if($u_location == 'Solomon Islands') echo 'selected'; ?> value="Solomon Islands">Solomon Islands</option>
						<option <?php if($u_location == 'Somalia') echo 'selected'; ?> value="Somalia">Somalia</option>
						<option <?php if($u_location == 'South Africa') echo 'selected'; ?> value="South Africa">South Africa</option>
						<option <?php if($u_location == 'Spain') echo 'selected'; ?> value="Spain">Spain</option>
						<option <?php if($u_location == 'Sri Lanka') echo 'selected'; ?> value="Sri Lanka">Sri Lanka</option>
						<option <?php if($u_location == 'Sudan') echo 'selected'; ?> value="Sudan">Sudan</option>
						<option <?php if($u_location == 'Suriname') echo 'selected'; ?> value="Suriname">Suriname</option>
						<option <?php if($u_location == 'Swaziland') echo 'selected'; ?> value="Swaziland">Swaziland</option>
						<option <?php if($u_location == 'Sweden') echo 'selected'; ?> value="Sweden">Sweden</option>
						<option <?php if($u_location == 'Switzerland') echo 'selected'; ?> value="Switzerland">Switzerland</option>
						<option <?php if($u_location == 'Syria') echo 'selected'; ?> value="Syria">Syria</option>
						<option <?php if($u_location == 'Tahiti') echo 'selected'; ?> value="Tahiti">Tahiti</option>
						<option <?php if($u_location == 'Taiwan') echo 'selected'; ?> value="Taiwan">Taiwan</option>
						<option <?php if($u_location == 'Tajikistan') echo 'selected'; ?> value="Tajikistan">Tajikistan</option>
						<option <?php if($u_location == 'Tanzania') echo 'selected'; ?> value="Tanzania">Tanzania</option>
						<option <?php if($u_location == 'Thailand') echo 'selected'; ?> value="Thailand">Thailand</option>
						<option <?php if($u_location == 'Togo') echo 'selected'; ?> value="Togo">Togo</option>
						<option <?php if($u_location == 'Tokelau') echo 'selected'; ?> value="Tokelau">Tokelau</option>
						<option <?php if($u_location == 'Tonga') echo 'selected'; ?> value="Tonga">Tonga</option>
						<option <?php if($u_location == 'Trinidad & Tobago') echo 'selected'; ?> value="Trinidad & Tobago">Trinidad & Tobago</option>
						<option <?php if($u_location == 'Tunisia') echo 'selected'; ?> value="Tunisia">Tunisia</option>
						<option <?php if($u_location == 'Turkey') echo 'selected'; ?> value="Turkey">Turkey</option>
						<option <?php if($u_location == 'Turkmenistan') echo 'selected'; ?> value="Turkmenistan">Turkmenistan</option>
						<option <?php if($u_location == 'Turks & Caicos Is') echo 'selected'; ?> value="Turks & Caicos Is">Turks & Caicos Is</option>
						<option <?php if($u_location == 'Tuvalu') echo 'selected'; ?> value="Tuvalu">Tuvalu</option>
						<option <?php if($u_location == 'Uganda') echo 'selected'; ?> value="Uganda">Uganda</option>
						<option <?php if($u_location == 'United Kingdom') echo 'selected'; ?> value="United Kingdom">United Kingdom</option>
						<option <?php if($u_location == 'Ukraine') echo 'selected'; ?> value="Ukraine">Ukraine</option>
						<option <?php if($u_location == 'United Arab Erimates') echo 'selected'; ?> value="United Arab Erimates">United Arab Emirates</option>
						<option <?php if($u_location == 'United States of America') echo 'selected'; ?> value="United States of America">United States of America</option>
						<option <?php if($u_location == 'Uraguay') echo 'selected'; ?> value="Uraguay">Uruguay</option>
						<option <?php if($u_location == 'Uzbekistan') echo 'selected'; ?> value="Uzbekistan">Uzbekistan</option>
						<option <?php if($u_location == 'Vanuatu') echo 'selected'; ?> value="Vanuatu">Vanuatu</option>
						<option <?php if($u_location == 'Vatican City State') echo 'selected'; ?> value="Vatican City State">Vatican City State</option>
						<option <?php if($u_location == 'Venezuela') echo 'selected'; ?> value="Venezuela">Venezuela</option>
						<option <?php if($u_location == 'Vietnam') echo 'selected'; ?> value="Vietnam">Vietnam</option>
						<option <?php if($u_location == 'Virgin Islands (Brit)') echo 'selected'; ?> value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
						<option <?php if($u_location == 'Virgin Islands (USA)') echo 'selected'; ?> value="Virgin Islands (USA)">Virgin Islands (USA)</option>
						<option <?php if($u_location == 'Wake Island') echo 'selected'; ?> value="Wake Island">Wake Island</option>
						<option <?php if($u_location == 'Wallis & Futana Is') echo 'selected'; ?> value="Wallis & Futana Is">Wallis & Futana Is</option>
						<option <?php if($u_location == 'Yemen') echo 'selected'; ?> value="Yemen">Yemen</option>
						<option <?php if($u_location == 'Zaire') echo 'selected'; ?> value="Zaire">Zaire</option>
						<option <?php if($u_location == 'Zambia') echo 'selected'; ?> value="Zambia">Zambia</option>
						<option <?php if($u_location == 'Zimbabwe') echo 'selected'; ?> value="Zimbabwe">Zimbabwe</option>
					</select>
				</div>
				
				<!--gender input-->
				<div class="form-group">
					<label><h5>Gender:</h5></label>
					<input type="radio" id="male" name="u_gender" value="male" <?php if($u_gender == 'male') echo 'checked'; ?>>
					<label for="male">Male</label>
					<input type="radio" id="female" name="u_gender" value="female" <?php if($u_gender == 'female') echo 'checked'; ?>>
					<label for="female">Female</label>
				</div>
				
				<!--image input-->
				<div class="form-group" >
					<label> User Image: </label>
					<input type="file" name="u_image" class="form-control" required ><br>
					<img src="user_images/<?php echo $u_image; ?>" width="100" height="100" class="img-responsive" >
				</div>
				
				<!--update button-->
				<div class="text-center" ><!-- text-center Starts -->
					<button name="update" class="btn btn-primary" >
						<i class="fa fa-refresh" ></i> Update Now
					</button>
				</div>
			</form>
		</div>
	</body>
</html>

<?php
	if(isset($_POST['update'])){
		$update_id = $u_id;
		$u_name = $_POST['u_name'];
		$u_username = $_POST['u_username'];
		unlink("user_images/$u_username.png");
		$month=$_POST['Month'];
		$dt=$_POST['Day'];
		$year=$_POST['Year'];
		$date_value="$month/$dt/$year";
			
		$u_location = $_POST['u_location'];
		$u_gender = $_POST['u_gender'];
		
		$u_image = $_FILES['u_image']['name'];
		$u_image_tmp = $_FILES['u_image']['tmp_name'];
		move_uploaded_file($u_image_tmp,"user_images/$u_username.png");
		$update_user = "update user set u_name='$u_name', u_birthday='$date_value', u_location='$u_location', u_gender='$u_gender', u_image='$u_username.png' where u_id='$update_id'";
		$run_user = mysqli_query($con,$update_user);
		if($run_user){
			echo "<script>alert('Your account has been updated please login again')</script>";
			echo "<script>window.open('logout.php','_self')</script>";
		}else{
			echo "<script>alert('Your account has Not been updated')</script>";
		}
	}
?>