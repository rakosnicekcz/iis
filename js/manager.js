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
