var health;
var usertype;

$(document).ready(function() {
  $.ajax({
      url: './getstatus.php',
      type: 'get',
      dataType: 'JSON',
      success: function(response){
      },error: function (error) {
      },complete: function (response) {
        var parsed = JSON.parse(response.responseText);
        health = parseInt(parsed[0].health, 10);
        usertype = parsed[0].usertype;
        $('.health').text("Health: " + health); 
        $('.usertype').text("Class: " + usertype); 
      }
  });
});


var game = null;
window.fetch('./game.json')
	.then(response => { return response.json() })
	.then(data => {game = data});


var setOptionOneText = function(text){
	document.getElementsByClassName('option1')[0].innerHTML = text;
}
var setOptionTwoText = function(text){
	document.getElementsByClassName('option2')[0].innerHTML = text;
}
var updateStatus = function(healthType, playerType){
	if (healthType == 'plus'){
		health++;
	}
	if (healthType == 'minus'){
		health--;
	}
	if (healthType == 'reset'){
		health = 1;
	}
	if (playerType == 'wizard'){
		usertype = 'wizard';
	}
	if (playerType == 'knight'){
		usertype = 'knight';
	}
	if (playerType == 'reset'){
		usertype = 'human';
	}
	document.getElementsByClassName('health')[0].innerHTML = "Health: " + health;
	document.getElementsByClassName('usertype')[0].innerHTML = "Class: " + usertype;
	saveStatus();
}

function saveStatus() {
  $.post("./savestatus.php",
  {
    usertype: usertype,
    health: health
  })
}


var wizardResponseOne = function(){
	document.getElementsByClassName('game-text')[0].innerHTML = game.wizard.choices[0].response;
	updateStatus('plus', 'na');
}
var wizardResponseTwo = function(){
	document.getElementsByClassName('game-text')[0].innerHTML = game.wizard.choices[1].response;
	updateStatus('minus', 'na');
} 
var knightResponseOne = function(){
	document.getElementsByClassName('game-text')[0].innerHTML = game.knight.choices[0].response;
	updateStatus('minus', 'na');
}
var knightResponseTwo = function(){
	document.getElementsByClassName('game-text')[0].innerHTML = game.knight.choices[1].response;
	updateStatus('plus', 'na');
} 


var choiceOne = function(){
	updateStatus('na', 'wizard');
	document.getElementsByClassName('game-text')[0].innerHTML = game.wizard.text;

	setOptionOneText(game.wizard.choices[0].choice);
	document.getElementsByClassName('option1')[0].onclick = wizardResponseOne;
	
	setOptionTwoText(game.wizard.choices[1].choice);
	document.getElementsByClassName('option2')[0].onclick = wizardResponseTwo;
}

var choiceTwo = function(){
	updateStatus('na', 'knight');
	document.getElementsByClassName('game-text')[0].innerHTML = game.game.start;
	
	setOptionOneText(game.knight.choices[0].choice);
	document.getElementsByClassName('option1')[0].onclick = knightResponseOne;
	
	setOptionTwoText(game.knight.choices[1].choice);
	document.getElementsByClassName('option2')[0].onclick = knightResponseTwo;
}


var startOver = function(){
	updateStatus('reset', 'reset');
	document.getElementsByClassName('game-text')[0].innerHTML = game.game.start;
	setOptionOneText(game.game.wizard);
	setOptionTwoText(game.game.knight);
	document.getElementsByClassName('option1')[0].onclick = choiceOne;
	document.getElementsByClassName('option2')[0].onclick = choiceTwo;
}


var fightDragon = function(){
	if (health < 5){
		document.getElementsByClassName('game-text')[0].innerHTML = "The dragon killed you.<br> You need to raise your stats more.";
	} else {
		document.getElementsByClassName('game-text')[0].innerHTML = "Congratulations!!!<br> You defeated the dragon!";
	}
}





function hamburger(){
	var list = document.getElementById('list');
	if (list.classList == 'hide'){
		list.classList = 'show';
	} else {
		list.classList = 'hide';
	}
}









