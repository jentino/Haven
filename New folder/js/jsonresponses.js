

onMessage = function(msg) {
	
	js = JSON.parse(msg.data);
	
	if (js.error) { 
		writeToScreen("Error: " + js.error.message);
		return;
	}
	
	else if (js.msg_type == 'authorize') {
		//alert("AUTH");
		document.getElementById("statusblock").innerHTML = "Online".bold().fontcolor("#59E817");
		connectLock = "Switch";
		
		var get = parseGetVars();   
		writeToSmallScreen( "> Connected as " + appid_temp );         
		writeToScreen(js.authorize.email + "---------------");

		if(OriginalBalanceLock == "Off"){
			playSoundCustom(14);
			OriginalBalance = js.authorize.balance;
			document.getElementById("originalbalance").innerHTML = OriginalBalance;
			OriginalBalanceLock = "On";
			showBalance(OriginalBalance);
			
		}

		
		//writeWinLossToScreen();
			
		//setTimerOnce = 1;
		onSecTimer();
		showRescueAmount();
		subscribeTransactions();
		//subscribeTicks();
		showBalance(js.authorize.balance);
	}
	else if (js.msg_type == 'buy') {

			writeToScreen("$"+ js.buy.buy_price + " , " + (js.buy.shortcode).slice(0,3) + " , " + setTransactionID(js.buy.transaction_id));
	}

	else if (js.msg_type == 'portfolio') {
				
		for(var g in js.portfolio.contracts){

			writeToScreen("> " + js.portfolio.contracts[g].buy_price + " ," + js.portfolio.contracts[g].contract_type + " ," + js.portfolio.contracts[g].transaction_id + " ," + returnTime(js.portfolio.contracts[g].purchase_time));

			tradeOptionIdLock = js.portfolio.contracts[g].transaction_id;
			
		}
			
	}
	
	else if (js.msg_type == 'profit_table') {

		for(var f in js.profit_table.transactions){
			if(js.profit_table.transactions[f].transaction_id == current_transaction_id){
				writeToScreen("= " + checkWinOrLoss(js.profit_table.transactions[f].buy_price,js.profit_table.transactions[f].sell_price) + " ," + js.profit_table.transactions[f].transaction_id);
				writeWinLossToScreen();
				current_transaction_id = "NULL";
			}
			
		}
			
	}

	else if (js.msg_type == 'transaction') {

		writeBalanceToDash(js.transaction.balance);
	}
	else if (js.msg_type == 'time') {
		
		writeTimeToScreen(js.time);
	}
};