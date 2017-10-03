function myStopFunction() {

		if (document.body.scrollTop <= 0) {
			console.log("scrolling down");
		} else {
			console.log("scrolling up");
			clearInterval(myVar);
		}

}