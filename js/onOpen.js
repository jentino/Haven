/////////////////////////////////////////////////////////// Implement Event Listeners
onOpen = function(evt,tk) {
		var token = tk;
        ws.send(JSON.stringify({
            authorize: token
        }));
};