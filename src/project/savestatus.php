<?php
	include '../config.php';
	session_start();
	
	if (filter_input(INPUT_COOKIE, 'auth') == session_id()) {
		$fname = $_SESSION['firstname'];
		$lname = $_SESSION['lastname'];
		$email = $_SESSION['email'];
	}
	
	// $usertype = $_GET['usertype'];
	// $health = $_GET['health'];
	$usertype = filter_input(INPUT_POST, 'usertype');
	$health = filter_input(INPUT_POST, 'health');

	$health = intval($health);

	$sql = "UPDATE status
					SET usertype = '$usertype', health = '$health' 
					WHERE email = '$email';
	";
	

	$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
?>



























