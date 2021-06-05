<?php
	include('../config.php');

	$display = 
	'<body style="background-color: bisque">
		<fieldset><legend><h3>User information</h3></legend>
			<form method="POST" action="./applyaccount.php">
				<p><Strong>First Name:</Strong><br>
				<input type="text" name="firstname"></p>

				<p><Strong>Last Name:</Strong><br>
				<input type="text" name="lastname"></p>

				<p><Strong>Email:</Strong><br>
				<input type="text" name="email"></p>

				<p><Strong>Password:</Strong><br>
				<input type="text" name="password"></p>

				<p><Strong>Age:</Strong><br>
				<input type="number" name="age" value="25" style="width: 80px"></p>

				<p><Strong>Gender:</Strong><br>
				<input type="radio" name="gender" value="male" style="margin-top:10px"><Strong>Male</Strong>
				<input type="radio" name="gender" value="female"><Strong>Female</Strong></p>

				<input type="submit" value="Create Account">
			</form>
		</fieldset>
	</body>';


	$email = filter_input(INPUT_POST, 'email');
	$email = strtolower($email);

	$firstname = filter_input(INPUT_POST, 'firstname');
	$lastname = filter_input(INPUT_POST, 'lastname');
	$password = filter_input(INPUT_POST, 'password');
	$age = filter_input(INPUT_POST, 'age');
	$gender = filter_input(INPUT_POST, 'gender');
	$sql;

	$sql = "SELECT email FROM members";
	
  $result = mysqli_query($conn, $sql) or die(mysqli_error($mysqli));

  if (mysqli_num_rows($result) >= 0){
  	$valid = "true";

  	while ($info = mysqli_fetch_array($result)) {
			$tableEmail = stripslashes($info['email']);
			if ($tableEmail == $email){
				echo "<strong>The email address ".$email." is already in use, try again.</strong>";
				$valid = "false";
			}
		}

		if ($valid == "true" && $email != ""){
			$pathname = "/var/www/html/uploaddir/".$email."";
			mkdir($pathname, 0733);

			$sql = "INSERT INTO members VALUES ('".$firstname."', '".$lastname."', 
			'".$email."', '".SHA1($password)."', '".$age."', '".$gender."', CURDATE())
			";

			if ($conn->query($sql) === TRUE) {
				$display = "
					<body style='background-color: bisque'>
						<p>Your account \"".$email."\" has been created. Thank you for joining us!</p>
						<p><a href='./userlogin.html'>Go to Login</a></p>
					</body>
				";
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
  }
  
?>

<html>
	<body>
		<?php echo "$display"; ?>
	</body>
</html>