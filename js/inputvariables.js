var tradeLock = "Open";
var tockSeconds;
var current_transaction_id = "Off";
var current_transaction_id_live = "Off";
var setTimerOnce = 1;
var tockMinutes;
var temp_minute = "";
var globalMinutes;
var rescue 	= 0;
var tradeway = "Off";
var countdots = 0;
var candlecount = -1;
var candlesarray = [];
var dotsarray = [];
var winlossresult;
var wslive;
var jslive;
var tradeTracker = [];
var tc = -1;
var Cycleposition = 1;
//var tradeamount = [0.35,0.46,0.74,1.58,3.35,7.12,15.12];
                        //var tradeamount = [1.12,2.38,5.05,10.73,22.78,48.37,102.72];
//var tradeamount = [54,114.67,243.52,517.14,1098.20,2332.13,4952.50]
var tradeamount = [10.90,23.15,49.16,104.39,221.67,470.74,999.67]
//var tradeamount = [1.12,2.04,4.34,9.21,19.57,41.55,88.24,190];
//var tradeamount = [0.35,0.46,0.58,0.65,0.85,1.85,4.5,15];
//var tradeamount = [0.35,0.46,0.35,0.41,0.86,1.83,3.89,8.26];
//var tradeamount = [0.35,0.45,0.35,0.74,0.74,1.58,3.35,7.12];
//var tradeamount = [0.35,0.46,0.52,1.10,2.30,4.89,10.37];
//var tradeamount = [0.35,0.35,0.54,1,1.58,2.58,3.35,7.12,15.12,32.10,48.17,99];
        //var tradeamount = [1.1,0.74,1.58,3.35,7.12,15.12];
//var tradeamount = [1.12,0.74,0.35,0.39,0.84,1.78,3.78,8.03];
//var tradeamount = [1,2.12,4.51,9.58,20.34,43.19,91.71,194.76,413.59,878.31];
//var tradeamount = [0.66,0.35,0.74,1.58,3.35,7.12,15.12,32.10]; //jetliner
//var tradeamount = [0.35,0.41,0.42,0.77,1.63,3.46,7.35,15.61]; //speedliner
//var tradeamount = [0.35,0.35,0.41,0.87,1.84,3.91,8.30,17.62]; //cruiser
//var tradeamount = [0.35,0.41,0.87,1.84,3.91,8.30];
var Intervals = [1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59];
//var Intervals = [2,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59];

var tickCounter = 1;
var tickTradeSwitch = 777;
var tickCycle = 0;
var tickCycleSearch = 0;
var tickLock = "Open";

var tradeProfit = 0;
var maxProfit = 0;
var targetProfit = 0;

var tradeLoss = 0;
var countbuys = 0;
var countsells = 0;
var countlosses = 0;
var countwins = 0;
var totalwins = 0;
var tradeCycle = 3333;



var connectLock = "OnOn";
var OriginalBalanceLock = "Off";
var newtradeOptionIdLock = 12345;
var oldtradeOptionIdLock = 12345;
var liveAccountLock = "Off";

var signalCandle;
var appid_temp = "";
var appidlive = "";
var appiddemo = "";
var tokenidlive = "";
var tokeniddemo = "";
var output;
var outputemail;
var assetvalue = "R_100";
var OriginalBalance = 0;
var OriginalBalanceMain = 0;

