<?php
	include '../config.php';
	session_start();
	setcookie("auth", session_id(), time()+60*30, "/", "", 0);

	$sql = "SELECT email, password FROM dragontamers;";
	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	$valid = false;
	$email = filter_input(INPUT_POST, 'email');
	$password = filter_input(INPUT_POST, 'password');

	if (mysqli_num_rows($result) > 0){
		while ($info = mysqli_fetch_array($result)){
			if ($info['email'] == $email && $info['password'] == $password){
				$valid = true;
			} 
		}
	}
	
	if ($valid == true){
		$_SESSION['email'] = $email;
	} 

	if (isset($_SESSION['email']) == false){
		header("Location: dragonhome.php");
		exit;
	}
	
	$sql = "SELECT fname, lname
					FROM dragontamers
					WHERE email = '".$_SESSION['email']."';
	";
	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	$display_block = "";

	if (mysqli_num_rows($result) == 1){
		$info = mysqli_fetch_array($result);
		$fname = stripslashes($info['fname']);
		$lname = stripslashes($info['lname']);
		$_SESSION['firstname'] = $fname;
		$_SESSION['lastname'] = $lname;

		$display_block .= "<span style='color:orange;'>Welcome</span> ".$fname." ".$lname."";
	}
	
	
?>

<html>
	<head>
		<script src="../jquery-3.5.1.min.js"></script>
		<link rel="stylesheet" href="./styles.css" />
		<script src="./site.js"></script>
	</head>
	<body>
		<div class="nav-container">
			<img id="hamburger" src="./images/hamburger.svg" onclick="hamburger()"/>
			<ul id="list" class="hide">
				<li><a href="dragonhome.php">Home</a></li>
				<li><a href="./account.php">Account</a></li>
				<li><a href="./about.php">About</a></li>
				<li id="logout-button"><a href="logout.php">Logout</a></li>
			<ul>
		</div>

		

		<div class="account-container">
			<div class="welcome"><?php echo "$display_block"; ?></div>
			<div class="game-container">
				<div class="main-game-content">
					<p class="game-text">Hello wanderer</p>
					<button class="option1" onclick=choiceOne()>Choose to be a wizard</button>
					<button class="option2" onclick=choiceTwo()>Choose to be a knight</button>
				</div>
				
				<div class='start-health-container'>
					<div class='usertype'></div>
					<div class='health'></div>
					<button class="fight-dragon-button" onclick=fightDragon()>Fight Dragon?</button>
					<button class="start-over-button" onclick=startOver()>Start Over</button>
				</div>
			</div>
		</div>
	</body>
</html>





























