function post(email){
	var xhr = new XMLHttpRequest();

	xhr.onload = function() {
		document.getElementById('posted-email').innerHTML = this.responseText;
		document.getElementById('details').innerHTML = this.responseText;
	}

	xhr.open('POST', './ajax.php?email=' + email, true);
	// xhttp.setRequestHeader("Content-type", "");
	xhr.send();
}

function get(email){
	var xhr = new XMLHttpRequest();
	var newContent = '';

	xhr.onload = function() {
		document.getElementById('gotten-email').innerHTML = this.responseText;
		document.getElementById('details').innerHTML = this.responseText;
	}

	xhr.open('GET', './ajax.php?email=' + email, true);
	xhr.send();
}
























