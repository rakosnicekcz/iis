window.onload = () => {
	highlightLeftSlots();
};

function highlightLeftSlots() {
	document.querySelectorAll(".ticketsLeft").forEach((e) => {
		let val = parseInt(e.textContent);
		let capacity = parseInt(
			e.parentElement.querySelector(".ticketsCapacity").textContent
		);
		if (val == 0) {
			e.classList.add("text-danger");
		} else if ((val * 100) / capacity < 10) {
			e.classList.add("text-warning");
		}
	});
}
