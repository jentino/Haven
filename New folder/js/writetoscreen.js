function writeToScreen(message) {

	var div = document.createElement("p");
	div.style.wordWrap = "break-word";
	div.innerHTML = message;    
	output.appendChild(div);    
	div.scrollIntoView(); 	       
}

function writeToSmallScreen(message) {

	var div = document.createElement("p");
	div.style.wordWrap = "break-word";
	div.innerHTML = message;    
	output2.appendChild(div);    
	div.scrollIntoView(); 	       
}
	
function writeTimeToScreen(thetime) {
	
	var d = new Date(0); // The 0 there is the key, which sets the date to the epoch
	d.setUTCSeconds(thetime);
	
	globalMinutes = d.getMinutes();
	
	if(setTimerOnce == 1) {
		
		startTockClock();
		writeToSmallScreen( "> Program ready. Do not close this window. " ); 
		setTimerOnce = 50000;
	}

	document.getElementById("showTheTime").innerHTML = returnFullTime(thetime);

}	
function writeBalanceToDash(updatedbalanceamount) {

	document.getElementById("realbalance").innerHTML = updatedbalanceamount.bold();
}

function writeWinLossToScreen() {
    
	winlossresult = countwins - countlosses;
	
	document.getElementById("winlossDash").innerHTML = totalwins + " / " + winlossresult;

//if (appid_temp == appidlive){
	if(tradeCycle >= 10) {
		maxProfit = (tradeProfit - tradeLoss).toFixed(2);
		document.getElementById("profitupdate").innerHTML = maxProfit;
	}
	//document.getElementById("showTheTime").innerHTML = tickLock;
	switchAccounts();
}
