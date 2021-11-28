let ajaxPath;
function removePlanItem(ele, id) {
	var formData = new FormData();
	formData.append("id", id);

	fetch(ajaxPath + "ajax-managerDeletePlan", {
		method: "POST",
		body: formData,
	}).then(function (response) {
		ele.parentElement.parentElement.remove();
	});
}

function removeResrvationsByCode(ele, code) {
	var formData = new FormData();
	formData.append("code", code);

	fetch(ajaxPath + "ajax-managerDeleteTicketByCode", {
		method: "POST",
		body: formData,
	}).then(function (response) {
		ele.parentElement.parentElement.remove();
	});
}
