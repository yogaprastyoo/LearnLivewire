// Validate Name
document.getElementById("nameInput").oninput = function () {
    validateName(this);
};

function validateName(inputElement) {
    inputElement.value = inputElement.value.replace(/[^a-zA-Z'. ]/g, "");
}

// Validate Email
document.getElementById("emailInput").oninput = function () {
    validateEmail(this);
};

function validateEmail(inputElement) {
    inputElement.value = inputElement.value.replace(/[^a-zA-Z0-9.@]/g, "");
}
