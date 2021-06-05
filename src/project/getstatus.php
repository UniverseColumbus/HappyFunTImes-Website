<?php
	include '../config.php';
	session_start();
	
	// if (filter_input(INPUT_COOKIE, 'auth') == session_id()) {
	// 	$fname = $_SESSION['firstname'];
	// 	$lname = $_SESSION['lastname'];
	// 	$email = $_SESSION['email'];
	// }
	$email = $_SESSION['email'];


	$return_arr = array();

	$sql = "SELECT health, usertype 
					FROM status
					WHERE email = '$email'; 
	";

	$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

	$info = mysqli_fetch_array($result);
  $health = $info['health'];
  $usertype = $info['usertype'];

  $return_arr[] = array("health" => $health,
												"usertype" => $usertype);
	echo json_encode($return_arr);
?>