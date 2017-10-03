function Buyit(buydollars) {
        if (ws) {
		    
            ws.send(JSON.stringify({
			   "buy": "uw2mk7no3oktoRVVsB4Dz7TQnFfABuFDgO95dlxfMxRuPUsz",
			   "price": 7000,
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
			
			countbuys++;
			//playSoundCustom(5);
        }
}

function Sellit(selldollars) {
       if (ws) {
		    
            ws.send(JSON.stringify({
			   "buy": "uw2mk7no3oktoRVVsB4Dz7TQnFfABuFDgO95dlxfMxRuPUsz",
			   "price": 7000,
			   "parameters": 
			   {
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
			
			countsells++;
			//playSoundCustom(5);
        }
}

function GetBalance() {
        if (ws) {
            ws.send(JSON.stringify({
                "balance": 1
            }));
			
        }
}

function GetProfitTable() {
        if (ws) {
		    
            ws.send(JSON.stringify({
			  "profit_table": 1,
			  "limit": 1
			}));
        }
}




function GetTimer() {
	if (ws) {
		ws.send(JSON.stringify({
		"time": 1
		}));
	}

}

function PingBinServer() {
	if (ws) {
		ws.send(JSON.stringify({
		"ping": 1
		}));
	}
}
