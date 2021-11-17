let userToEditId;
let modalEditErr = { email: 0, name: 0, surename: 0 };

window.onload = () => {
	addListeners();
};

function validate_modalEditErr() {
	return (
		modalEditErr.email == 0 &&
		modalEditErr.name == 0 &&
		modalEditErr.surename == 0
	);
}

function search() {
	let value = document.querySelector("#usersFilter").value.toLocaleLowerCase();
	Array.from(document.querySelectorAll("#usersTbody tr")).map((e) => {
		e = e.querySelectorAll("td, th");
		for (let i = 0; i < e.length - 1; i++) {
			if (e[i].textContent.toLocaleLowerCase().trim().includes(value.trim())) {
				e[i].parentElement.style.display = "table-row";
				break;
			}
			e[i].parentElement.style.display = "none";
		}
	});
}

function addListeners() {
	document.querySelector("#usersFilter").addEventListener("input", () => {
		search();
	});

	document.querySelector("#modalInputEmail").addEventListener("input", (e) => {
		if (validateEmail(e.target.value)) {
			e.target.classList.remove("is-invalid");
			modalEditErr.email = 0;
			document.querySelector("#editSubmit").disabled = !validate_modalEditErr();
		} else {
			e.target.classList.add("is-invalid");
			modalEditErr.email = 1;
			document.querySelector("#editSubmit").disabled = true;
		}
	});
	document.querySelector("#modalInputName").addEventListener("input", (e) => {
		if (e.target.value.length > 0) {
			e.target.classList.remove("is-invalid");
			modalEditErr.name = 0;
			document.querySelector("#editSubmit").disabled = !validate_modalEditErr();
		} else {
			e.target.classList.add("is-invalid");
			modalEditErr.name = 1;
			document.querySelector("#editSubmit").disabled = true;
		}
	});
	document
		.querySelector("#modalInputSurename")
		.addEventListener("input", (e) => {
			if (e.target.value.length > 0) {
				e.target.classList.remove("is-invalid");
				modalEditErr.surename = 0;
				document.querySelector("#editSubmit").disabled =
					!validate_modalEditErr();
			} else {
				e.target.classList.add("is-invalid");
				modalEditErr.surename = 1;
				document.querySelector("#editSubmit").disabled = true;
			}
		});
}

function editUserModal(id) {
	var formData = new FormData();
	formData.append("id", id);
	fetch("ajax-getUserById", {
		method: "POST",
		body: formData,
	})
		.then(function (response) {
			return response.json();
		})
		.then(function (data) {
			editUserModalInsertData(data);
		});
}

function editUserModalInsertData(data) {
	userToEditId = data.ID;
	document.querySelector("#modalInputEmail").value = data.email;
	document.querySelector("#modalInputName").value = data.name;
	document.querySelector("#modalInputSurename").value = data.surename;
	document.querySelector("#modalCheckboxAdmin").checked = data.is_admin == "1";
}

function editUserModalSubmit() {
	let email = document.querySelector("#modalInputEmail").value;
	let name = document.querySelector("#modalInputName").value;
	let surename = document.querySelector("#modalInputSurename").value;
	let admin = document.querySelector("#modalCheckboxAdmin").checked ? "1" : "0";

	var formData = new FormData();
	formData.append("id", userToEditId);
	formData.append("email", email);
	formData.append("name", name);
	formData.append("surename", surename);
	formData.append("admin", admin);
	userToEditId = undefined;

	fetch("ajax-updateUserById", {
		method: "POST",
		body: formData,
	})
		.then(function (response) {
			return response.json();
		})
		.then(function (data) {
			editUsersUpdateTable(data);
		});
}

function editUsersUpdateTable(data) {
	let html = "";
	modalEditErr = 0;
	data.forEach((e) => {
		let style = parseInt(e.is_admin) ? 'style="color: red"' : "";
		let email = parseInt(e.is_admin) ? e.email + " (admin)" : e.email;
		let conferenceStyle =
			parseInt(e.conferences) == 0 ? 'style="color: grey"' : "";
		let presentationsStyle =
			parseInt(e.presentations) == 0 ? 'style="color: grey"' : "";
		html += `
		<tr>
			<th scope="row" ${style}>${email}</th>
			<td>${e.name}</td>
			<td>${e.surename}</td>
			<td ${conferenceStyle}>${e.conferences}</td>
			<td ${presentationsStyle}>${e.presentations}</td>
			<td>
				<a
					href=""
					data-bs-toggle="modal"
					onclick="editUserModal(${e.id} )"
					data-bs-target="#userEditModal"
				>
					Edit
				</a>
			</td>
		</tr>`;
	});
	document.querySelector("#usersTbody").innerHTML = html;
}

function validateEmail(email) {
	const re =
		/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

function deleteUserModalSubmit() {
	var formData = new FormData();
	formData.append("id", userToEditId);
	userToEditId = undefined;

	fetch("ajax-deleteUserById", {
		method: "POST",
		body: formData,
	})
		.then(function (response) {
			return response.json();
		})
		.then(function (data) {
			editUsersUpdateTable(data);
		});
}
