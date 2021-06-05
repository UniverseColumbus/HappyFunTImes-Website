<!DOCTYPE html>
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
	<div class="dragon-container">
		<div class=login-page-image></div>
		<h1><span class="green">Fight</span> the <span class="green">Dragon!</span></h1>
	</div>

	
	<div class="login-container">
		<div class="login-create-container">
			

			<div class="login-form">
				<h3>Login</h3>
				<form method="post" action="./account.php">
					<p><strong>Username:</strong><br/>
					<input type="text" name="email" placeholder="example@gmail.com"/></p>

					<p><strong>Password:</strong><br/>
					<input type="password" name="password"/></p>

					<p><input class="submit-button" type="submit" name="submit" value="Login"/></p>
				</form>
			</div>


			<div class="login-create-account">
				<p><a href="./create_account.php">Create Account</a></p>
			</div>
		</div>
	</div>
	
</body>
</html>


































