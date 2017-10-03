function reConnect(token1, appid1) {
	
	wslive = new WebSocket('wss://ws.binaryws.com/websockets/v3?app_id='+appid1); 
	
	wslive.onopen = function(evt1) {
		onOpenlive(evt1,token1);
	};
	
	wslive.onmessage = function(evt1) {
		onMessagelive(evt1);
	};		
}

onOpenlive = function(evt1,tk1) {
	var token = tk1;
	wslive.send(JSON.stringify({
		authorize: token
	}));
};

onMessagelive = function(msg1) {
	
	jslive = JSON.parse(msg1.data);
	
	if (jslive.error) { 
		writeToScreen("Error: " + jslive.error.message);
		return;
	}
	
	else if (jslive.msg_type == 'authorize') {
		//showBalance(OriginalBalance);
		// writeToSmallScreen( "> Connesdfcted now as " + appiddemo );         
		// writeToScreen(js.authorize.email + "---------------");
		OriginalBalance = jslive.authorize.balance;
		document.getElementById("originalbalance").innerHTML = OriginalBalance;
		subscribeTransactions();
		showBalance(jslive.authorize.balance);
		writeWinLossToScreen();
	}
	else if (jslive.msg_type == 'transaction') {
		
		writeBalanceToDash(jslive.transaction.balance);
	}

	else if (jslive.msg_type == 'buy') {
		current_transaction_id_live = jslive.buy.transaction_id;
	}

	else if (jslive.msg_type == 'profit_table') {
		
			for(var f in jslive.profit_table.transactions){
				if(jslive.profit_table.transactions[f].transaction_id == current_transaction_id_live){
					checkWinOrLossLive(jslive.profit_table.transactions[f].buy_price,jslive.profit_table.transactions[f].sell_price);
					current_transaction_id_live = "NULL";
					writeWinLossToScreen();
				}					
			}
	}
};

function Buyitwslive(buydollars) {
	if (wslive) {
		
	wslive.send(JSON.stringify({
		   "buy": "uw2mk7no3oktoRVVsB4Dz7TQnFfABuFDgO95dlxfMxRuPUsz",
		   "price": 1000,
		   "parameters": 
		   {
			   "amount":buydollars,
			   "basis": "stake",
			   "contract_type": "CALL",
			   "currency":"USD",
			   "duration":"5",
			   "duration_unit": "t",
			   "proposal": 1,
			   "symbol": assetvalue
			}
			
		}));
		
		//countbuys++;
		//playSoundCustom(5);
	}
}

function Sellitwslive(selldollars) {
	if (wslive) {
		 
	 wslive.send(JSON.stringify({
		 "buy": "uw2mk7no3oktoRVVsB4Dz7TQnFfABuFDgO95dlxfMxRuPUsz",
		 "price": 1000,
		 "parameters":{
			 "amount":selldollars,
			 "basis": "stake",
			 "contract_type": "PUT",
			 "currency":"USD",
			 "duration":"5",
			 "duration_unit": "t",
			 "proposal": 1,
			 "symbol": assetvalue
		 }
			  
	 }));
	 //countsells++;
	 //playSoundCustom(5);	   
	 }
}

function subscribeTransactions() {
	if (wslive) {
	   
		wslive.send(JSON.stringify({
			"transaction": 1,
			"subscribe": 1
		}));
	}
}

function GetProfitTable_live() {
	if (wslive) {
		
		wslive.send(JSON.stringify({
		  "profit_table": 1,
		  "limit": 1
		}));
	}
}
		
   