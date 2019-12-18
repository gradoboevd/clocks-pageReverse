const viewON = document.getElementsByClassName("form-block__eye-on")[0];
const viewOFF = document.getElementsByClassName("form-block__eye")[0];
const password = document.getElementsByClassName("password")[0];

viewOFF.onclick = function () {
    viewOFF.className = "form-block__eye-on";
    viewON.className = "form-block__eye";
    password.type = "text";
}

viewON.onclick = function () {
    viewOFF.className = "form-block__eye";
    viewON.className = "form-block__eye-on";
    password.type = "password";
}