function AtrributeDisable(){
	document.getElementById('first-name').removeAttribute('disabled');
	document.getElementById('last-name').removeAttribute('disabled');
	document.getElementById('gender-male').removeAttribute('disabled');
	document.getElementById('gender-female').removeAttribute('disabled');
	document.getElementById('email').removeAttribute('disabled');
	document.getElementById('number').removeAttribute('disabled');
	document.getElementById("change").style.display = "inherit";
	document.getElementById("cancel").style.display = "inherit";

}

function AttributeEnable(){
	document.getElementById("first-name").disabled = true;
	document.getElementById('last-name').disabled = true;
	document.getElementById('gender-male').disabled = true;
	document.getElementById('gender-female').disabled = true;
	document.getElementById('email').disabled = true;
	document.getElementById('number').disabled = true;
	document.getElementById("change").style.display = "none";
	document.getElementById("cancel").style.display = "none";

}

function PasswordChange(){
	document.getElementById('info').style.display = "none";
	document.getElementById('passwordchange').style.display = "inherit";
	document.getElementById('cancelpasswordchange').style.display = "inherit";

}