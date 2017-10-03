//////////////////////////////////////////////////// PLAY TICKING SOUND 
function playSound() {
	var sound = document.getElementById("audio");
	sound.currentTime = 0;
	sound.play();		  
}

function playSoundTradeButtons(q) {
	var sound = document.getElementById("audio"+q);
	sound.currentTime = 0;
	sound.play();				  
}

function playSoundCustom(q) {
	var sound = document.getElementById("audio"+q);
    sound.play(); 		
}