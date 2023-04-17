window.onload=function preparePage() {	
    var playlistButton=document.getElementById("playlistButton");
    playlistButton.onclick=function(){
        loadPlaylist();
    }
}

function loadPlaylist() {
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("songs").innerHTML = this.responseText.split('\n').join('<br/>');
		}
  	};
  
	xhttp.open("GET", "./js/songs.txt", true);
	
	xhttp.send();
}