/////////////////////////////////////////////////////////////////  DISPLAY SERVER TIME SECONDS ON DASHBOARD
ii = 86400;
function onSecTimer() {
		  
		  ii--;
		  if (ws) {
			  ws.send(JSON.stringify({
	                time: 1
	            }));
	          }
		  if (ii < 0) {
			writeToScreen("Time is Up");
		  }
		  else {
			setTimeout(onSecTimer, 1000);
		  }
		  
}
       
stx = 0;

function startTockClock() {
	
    stx++;
		if(stx > 0){
			
			timer2.start();
			
		}	
    else
      setTimeout(startTockClock, 1000);
}