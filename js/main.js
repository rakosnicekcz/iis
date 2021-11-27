var idleTime = 0;
let loggedIn = false;
$(document).ready(function () {
	setInterval(timerIncrement, 60000);

	$(this).mousemove(() => {
		idleTime = 0;
	});
	$(this).keypress(() => {
		idleTime = 0;
	});
});

function timerIncrement() {
	idleTime = idleTime + 1;
	if (idleTime >= 10 && loggedIn) {
		window.location.replace("userAccessController/logout");
	}
}
