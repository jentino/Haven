function reConnect(token, appid) {
	
	appid_temp = appid;

	//document.querySelector('#showtradeLock').innerHTML = appid_temp;
	//playSoundCustom(16);
	
	if (token == '') {
		writeToSmallScreen("Invalid API Token");
		return;
	} 
		
	else {

		ws = new WebSocket('wss://ws.binaryws.com/websockets/v3?app_id='+appid); 
	
		ws.onopen = function(evt) {
			onOpen(evt,token);
		};
		
		ws.onmessage = function(evt) {
			onMessage(evt);
		};
	}
}