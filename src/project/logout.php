<?php
	session_start();
	setcookie("auth", "", time()-1800, "/", "", 0);
	session_destroy();
	header('Location: ./dragonhome.php');
?>