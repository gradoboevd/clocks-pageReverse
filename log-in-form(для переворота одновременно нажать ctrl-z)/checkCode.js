const wrongCode = document.getElementsByClassName("modalWind")[0];
const sendCodeBtn = document.getElementsByClassName("btn-submit")[0];
const codeVerification = document.getElementsByClassName("inp__val")[0];

sendCodeBtn.addEventListener("click", function(e) {
    e.preventDefault();
    let response;
    const data = {
        login: loginName.value,
        deviceName: deviceName.value,
        password: passwordCheck.value,
        code: codeVerification.value
    };
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "checkCode.php");
    xhr.onload = function() {
        if (xhr.status != 200) {
            alert(`Error ${xhr.status}: ${xhr.statusText}`);
        }
    };

    xhr.send(JSON.stringify(data));
    xhr.onload = function() {
        try {
            response = JSON.parse(xhr.responseText);
            if (response.status == "true") {
                window.location.href = 'http://loginpage/Dashboard/';
            }else{
                verificationWindow.style.display = "none";
                wrongCode.style.display = "block";

            }
        } catch (e) {
            console.log("Could not parse JSON!");
        }
    };
});