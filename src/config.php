<?php
	$hostname = '107.180.3.167';
	$port = 21;
	$username = 'ab04xanbnd5f';
	$password = '#1Starcheetah';
	$dbname   = 'happyfuntimesDB';

	$conn = mysqli_connect($hostname, $username, $password) OR die('Unable to connect to database! Please try again later.');
	mysqli_select_db($conn, $dbname);
?>