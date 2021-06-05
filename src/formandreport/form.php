<?php
	include('../config.php');

	if (isset($_POST['submit'])){
		$fname = filter_input(INPUT_POST, 'fname');
		$lname = filter_input(INPUT_POST, 'lname');
		$email = filter_input(INPUT_POST, 'email');
		$phone = filter_input(INPUT_POST, 'phone');

		$sql = "INSERT INTO users VALUES (CURDATE(), '".$fname."', '".$lname."', '".$email."', '".$phone."')";

		if ($conn->query($sql) === TRUE) {
			$display = "
				<body>
					<p>New Record Created Successfully</p>
					<table>
					<tr><td><strong>First Name</strong></td><td><strong>Last Name</strong></td><td><strong>E-mail</strong></td></tr>
					<tr><td>".$fname."</td><td>".$lname."</td><td>".$email."</td></tr>
					</table>
					<br><p>Thank you for joining us!</p>
					<p><a href='./formandreport.html'>Go Back</a></p>
				</body>
			";
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
	if (!isset($_POST['submit'])){
		$sql = "SELECT id, fname, lname, email, phone FROM users";
		$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

		if (mysqli_num_rows($result) > 0) {
			$display = "<table><tr><td><strong>First Name</strong></td><td><strong>Last Name</strong></td><td><strong>E-mail</strong></td></tr>";
			while ($info = mysqli_fetch_array($result)) {
				$id = stripslashes($info['id']);
				$fname = stripslashes($info['fname']);
				$lname = stripslashes($info['lname']);
				$email = stripslashes($info['email']);
				$phone = stripslashes($info['phone']);

				$display .= "
					<tr><td>".$fname."</td><td>".$lname."</td><td>".$email."</td></tr>
				";
			}
			$display .= "</table>";
		}
	}
?>

<html>
<body>
	<?php echo "$display"; ?>
<body>
</html>