<?php
include ('../config.php');

$email = $_REQUEST["email"];
if ($email == ""){
	echo "Field left blank.";
}
else {
	$allEmails = "SELECT email FROM emails;";
	$allResults = mysqli_query($conn, $allEmails) or die(mysqli_error($conn));
	$valid = true;

	if (mysqli_num_rows($allResults) > 0){
		while ($info = mysqli_fetch_array($allResults)) {
			if ($email == $info['email']){
				$valid = false;
			}
		}
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		if ($valid == true){
			$sql = "
		  INSERT INTO emails VALUES ('".$email."');
		  ";
		  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		  echo $email." posted to database!";
		} 
		else if ($valid == false){
			echo $email." is already in use. Enter a different email.";
		}
		
	}
	if ($_SERVER['REQUEST_METHOD'] === 'GET'){
		$sql = "SELECT email FROM emails WHERE email = '".$email."';";
	  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	  $info = mysqli_fetch_array($result);
		
		if (isset($info['email'])){
			if ($email == $info['email']){
				echo $email." was in database!";
			}
		}
		else {
			echo $email." is NOT in database. Send your email first.";
		}
	}
}








// $conn->query($sql);
// if ($conn->query($sql) === TRUE) {
// 	$display = "";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }
?>