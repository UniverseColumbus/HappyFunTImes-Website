<?php
	if (filter_input(INPUT_POST, 'submit')){
		include('../config.php');

		
		$fname = filter_input(INPUT_POST, 'fname');
		$lname = filter_input(INPUT_POST, 'lname');
		$email = filter_input(INPUT_POST, 'email');
		$password = filter_input(INPUT_POST, 'password');
		$display_block = "<div class='confirmation-bubble'>";

		$sql = "SELECT email FROM dragontamers";
		$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		$valid = true;
		if(mysqli_num_rows($result) >= 0){
			while($info = mysqli_fetch_array($result)){
				$user_email = $info['email'];
				if($user_email == $email){
					$valid = false;
				}
			}
		}
		if ($valid == false){
			$display_block .= "<p>Please use a different email.</p>";
		}
		if ($email == "" || $password == ""){
			$display_block .= "<p>You must enter an email and a password!</p>";
		}
		if ($email != "" && $password != "" && $valid == true){
			$sql = "INSERT INTO dragontamers VALUES('".$fname."','".$lname."','".$email."','".$password."');";
			$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

			$usertype = 'human';
			$health = 1;
			$sql = "INSERT INTO status VALUES('".$email."', '".$usertype."', ".$health.");";
			$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

			$display_block .= "<p>Thanks for joining us <span class='name'>".$fname." ".$lname."</span></p>
												<p>Username = <b>".$email."</b></p>
												<p>Go back to <a href='dragonhome.php'>user login</a></p>
											  ";
		}
		$display_block .= "</div>"; 
	}
?>

<html>
	<head>
		<script src="../jquery-3.5.1.min.js"></script>
		<script src="./site.js"></script>
		<link rel="stylesheet" href="styles.css">
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Nerko+One&display=swap');
		</style>
	</head>
	<body>
	<?php
		include 'navbar.php';
	?>

	<div class="container">
		<div class="account-form">
			<h3>Create Account</h3>

			<form method="post" action="./create_account.php">
				<p><strong>First Name:</strong><br/>
				<input type="text" name="fname" required /></p>

				<p><strong>Last Name:</strong><br/>
				<input type="text" name="lname" required/></p>

				<p><strong>Email:</strong><br/>
				<input type="email" name="email" required/></p>

				<p><strong>Password:</strong><br/>
				<input type="password" name="password" required/></p>

				<p><input class="submit-button" type="submit" name="submit" value="Create Account"/></p>
			</form>
		</div>
		<?php 
			if(filter_input(INPUT_POST, 'submit')){
				echo "$display_block"; 
			}
		?>
	</div>

		
		
	</body>
</html>






















