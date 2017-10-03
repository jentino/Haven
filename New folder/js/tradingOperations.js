
function tradeTickData() {

	mypb(totalwins);

	//tickCycleSearch = Intervals.indexOf(tickCycle);

	if(tockSeconds === 0  && tickLock === "Open") {
		tickCycle++;
		tradeCycle = tickCycle;
		//tradeCycle = tickCycle%5;
		tickCycle = tickCycle%60;
		tickLock = "Closed";

		
			if(tickTradeSwitch == "buy") {
				Buyit(tradeamount[rescue]);
				tradeway = "buy";
			} 
			else if(tickTradeSwitch == "sell") {
				Sellit(tradeamount[rescue]);
				tradeway = "sell";
			}
			else {
				tradeway = "sell";
				Sellit(tradeamount[rescue]);
			}
				

			playSoundCustom(3);	
	} 
	else if(tockSeconds === 4 && tickLock === "Closed") {
	 		tickLock = "Locked";
	 		playSoundCustom(18);
			
	}
	else if(tockSeconds === 13 && tickLock === "Locked") {
		tickLock = "Open";
		GetProfitTable();
		playSoundCustom(21);
	}
	
	tickCounter++;
}

//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------
function checkWinOrLoss(buyprice,amount){
	var str_return;
	
	if (amount > 0) {
			
			countdots++;
			if(tradeway == "buy")
				candlesarray.push("green");
			else
				candlesarray.push("red");

			if(tradeCycle >= 10) {
				tradeProfit = tradeProfit + parseFloat(buyprice)*0.89;
				totalwins++;
				countlosses = 0;
				rescue = 0;
			}
			
		
		str_return = "Win".bold().fontcolor("Green");
	}
	else {

		if(tradeway == "sell")
			candlesarray.push("green");
		else
			candlesarray.push("red");
		
			
			if(tradeCycle >= 10) {
				tradeLoss = tradeLoss + parseFloat(buyprice);
				countlosses++;
				rescue++;
			}
		str_return = "Loss".bold().fontcolor("Red");
	}

	candlecount++;
	document.getElementById("showPR").innerHTML = "<img src=../img/tiny"+  candlesarray[candlecount] +"box.png>";

	if(candlecount > 0)
		{
			document.getElementById("showNX").innerHTML = "<img src=../img/tiny"+  candlesarray[candlecount-5] +"box.png>";
			document.getElementById("showSG").innerHTML = "<img src=../img/tiny"+  candlesarray[candlecount-6] +"box.png>";
			
		}

	if((candlesarray[candlecount] == "green" && candlesarray[candlecount-6] == "green") || (candlesarray[candlecount] == "red" && candlesarray[candlecount-6] == "red") ){
		dotsarray.push("red");
	}
			
	else if((candlesarray[candlecount] == "green" && candlesarray[candlecount-6] == "red") || (candlesarray[candlecount] == "red" && candlesarray[candlecount-6] == "green")){
		dotsarray.push("green");
	}
	if(candlecount >= 6){
		document.getElementById("showdot1").innerHTML = "<img src=../img/tiny"+  dotsarray[candlecount-6] +"dot.png>";
		document.getElementById("showdot2").innerHTML = "<img src=../img/tiny"+  dotsarray[candlecount-7] +"dot.png>";
		document.getElementById("showdot3").innerHTML = "<img src=../img/tiny"+  dotsarray[candlecount-8] +"dot.png>";
		document.getElementById("showdot4").innerHTML = "<img src=../img/tiny"+  dotsarray[candlecount-9] +"dot.png>";

		document.getElementById("showdot5").innerHTML = "<img src=../img/tiny"+  dotsarray[candlecount-10] +"dot.png>";
		document.getElementById("showdot6").innerHTML = "<img src=../img/tiny"+  dotsarray[candlecount-11] +"dot.png>";
		document.getElementById("showdot7").innerHTML = "<img src=../img/tiny"+  dotsarray[candlecount-12] +"dot.png>";
		document.getElementById("showdot8").innerHTML = "<img src=../img/tiny"+  dotsarray[candlecount-13] +"dot.png>";

		document.getElementById("showdot9").innerHTML = "<img src=../img/tiny"+  dotsarray[candlecount-14] +"dot.png>";
		document.getElementById("showdot10").innerHTML = "<img src=../img/tiny"+  dotsarray[candlecount-15] +"dot.png>";
		document.getElementById("showdot11").innerHTML = "<img src=../img/tiny"+  dotsarray[candlecount-16] +"dot.png>";
		document.getElementById("showdot12").innerHTML = "<img src=../img/tiny"+  dotsarray[candlecount-17] +"dot.png>";

		document.getElementById("showdot13").innerHTML = "<img src=../img/tiny"+  dotsarray[candlecount-18] +"dot.png>";
		document.getElementById("showdot14").innerHTML = "<img src=../img/tiny"+  dotsarray[candlecount-19] +"dot.png>";
		// document.getElementById("showdot15").innerHTML = "<img src=../img/tiny"+  dotsarray[candlecount-20] +"dot.png>";
		// document.getElementById("showdot16").innerHTML = "<img src=../img/tiny"+  dotsarray[candlecount-21] +"dot.png>";
		
	}

	if(dotsarray[candlecount-6] == "red" && dotsarray[candlecount-7] !== "red"){
		
		if(candlesarray[candlecount-5] == "red"){
			tickTradeSwitch = "sell";
		}
		else if(candlesarray[candlecount-5] == "green"){
			tickTradeSwitch = "buy";
		}

	}
	else if(dotsarray[candlecount-6] == "green" && dotsarray[candlecount-7] !== "green"){
		
		if(candlesarray[candlecount-5] == "red"){
			tickTradeSwitch = "buy";
		}
		else if(candlesarray[candlecount-5] == "green"){
			tickTradeSwitch = "sell";
		}		
	}		
	return str_return;
}

//--------------------------------------------------------------------------------------------------

//function switchAccounts() {
	
function switchAccounts() {
	
	// if(lossresult == -4){

	//  	rescue = 0;
	// }
	// else if(lossresult == -8) {

	// 	rescue = 5;

	// }
		// if(appid_temp == appidlive){
		// 	//
		// 	reConnect(tokeniddemo, appiddemo);
		// }
			
		// else if (appid_temp == appiddemo){
		// 	//rescue = 7;
		// 	reConnect(tokenidlive,appidlive);
		// }
				
		
	//}
	if(tickCycle == 1) {

		if(appid_temp == appidlive){
			//rescue = 0;
			reConnect(tokeniddemo, appiddemo);
		}
			
		else if (appid_temp == appiddemo){
			reConnect(tokenidlive,appidlive);
		}

	}
}