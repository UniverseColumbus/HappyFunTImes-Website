$(document).ready(function() {


	$(".button1a").click(function(){
	  $(".tennis").animate(
	  	{
	  		height: "300px",
	  		width: "300px",
	  	}
	  );
	});
	$(".button1b").click(function(){
	  $(".tennis").animate(
	  	{
	  		height: "200px",
	  		width: "200px",
	  	}
	  );
	});
	$(".button1c").click(function(){
		$(".button1c").toggle(function(){
			$(".tennis-blurb").append(document.createTextNode(
				"Tennis is my favorite sport. I like the fact that it's just you and your opponent, and only you are responsible for determining your own fate."
			));
		});
	});


	$(".button2a").click(function(){
	  $(".swimming").animate(
	  	{marginLeft: "100px"}
	  );
	});
	$(".button2b").click(function(){
	  $(".swimming").animate(
	  	{marginLeft: "0px"}
	  );
	});
	$(".button2c").click(function(){
		$(".button2c").toggle(function(){
			$(".swimming-blurb").append(document.createTextNode(
				"Swimming is my favorite exercise. I like just being able to constantly push myself to swim faster and for longer periods. Plus it's low impact." 
			));
		});
	});


	$(".button3a").click(function(){
	  $(".boardgames").animate(
	  	{opacity: "0.5"}
	  );
	});
	$(".button3b").click(function(){
	  $(".boardgames").animate(
	  	{opacity: "1"}
	  );
	});
	$(".button3c").click(function(){
		$(".button3c").toggle(function(){
			$(".boardgames-blurb").append(document.createTextNode(
				"Boardgames are one of my favorite past-times with friends. I especially enjoy games that require a lot of strategy"
			));
		});
	});


});









































