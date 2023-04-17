window.onload=function preparePage() {
	if (sessionStorage.getItem("cookie") == null) {
		cookies();
	}
	var pictureButton = document.getElementById('pictureButton');
	pictureButton.onclick=function(){
		changePicture();
	}
}

function cookies() {
	alert("By using our website, you agree to our cookie policy which can be found in the bottom left.");
	sessionStorage.setItem("cookie", true);
}

function changePicture() {
	if (sessionStorage.getItem("profilePicture") == null || sessionStorage.getItem("profilePicture") == 4) {
		sessionStorage.setItem("profilePicture", 1);
		document.getElementById("profilePicture").setAttribute("src", "./images/"+sessionStorage.getItem("profilePicture")+".jpg");
	} else {
		var variable = parseInt(sessionStorage.getItem("profilePicture"),10);
		console.log(variable);
		sessionStorage.setItem("profilePicture", variable + 1)
		document.getElementById("profilePicture").setAttribute("src", "./images/"+sessionStorage.getItem("profilePicture")+".jpg");
	}
}