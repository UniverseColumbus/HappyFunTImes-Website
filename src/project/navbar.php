<?php
	session_start();

	$display = "";
	if (isset($_SESSION['email']) == true){
		$display .= "<ul id='list' class='hide'>
									<li><a href='./dragonhome.php'>Home</a></li>
									<li><a href='./account.php'>Account</a></li>
									<li><a href='./about.php'>About</a></li>
									<li id='logout-button'><a href='./logout.php'>Logout</a></li>
								</ul>
		";
	} else if(isset($_SESSION['email']) == false){
		$display .= "<ul id='list' class='hide'>
									<li><a href='./dragonhome.php'>Home</a></li>
									<li class='greyed-out'>Account</li>
									<li><a href='./about.php'>About</a></li>
								</ul>
		";
	}
?>

<div class="nav-container">
	<img id="hamburger" src="./images/hamburger.svg" onclick="hamburger()"/>
	<?php echo "$display" ?>
</div>
	
