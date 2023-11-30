const submit = document.getElementById('submit');
const clear = document.getElementById('clear');
inputArray = document.getElementsByTagName("input");
const req1 = document.getElementsByClassName("req1");
const req2 = document.getElementsByClassName("req2");
const req3 = document.getElementsByClassName("req3");

const openForm = item => {
    if (document.getElementById(item.id).style.display == "none") {
        document.getElementById(item.id).style.display = "flex";

        for (var index = 0; index < inputArray.length; index++)
            inputArray[index].disabled = true;

        submit.disabled = true;
        clear.disabled = true;
    } else {
        document.getElementById(item.id).style.display = "none";

        for (var index = 0; index < inputArray.length; index++)
            inputArray[index].disabled = false;

        submit.disabled = false;
        clear.disabled = false;
    }
}

const clearReq = () => {
    for (var index = 0; index < req1.length; index++)
        req1[index].style.color = "var(--black)";
    req1[1].className = "fa-solid fa-circle-exclamation req1"
    for (var index = 0; index < req2.length; index++)
        req2[index].style.color = "var(--black)";
    req2[1].className == "fa-solid fa-circle-exclamation req2"
    for (var index = 0; index < req3.length; index++)
        req3[index].style.color = "var(--black)";
    req3[1].className == "fa-solid fa-circle-exclamation req3"
}

const checkPass = () => {
    const password = document.getElementById("password");
    if (password.value != null && password.value.length >= 8) {
        for (var index = 0; index < req1.length; index++)
            req1[index].style.color = "green";
        if (req1[1].className == "fa-solid fa-circle-exclamation req1" || req1[1].className == "fa-solid fa-xmark req1") {
            req1[1].className = "fa-solid fa-check req1"
        }
    } else if (password.value.length != 0 && password.value.length < 8) {
        for (var index = 0; index < req1.length; index++)
            req1[index].style.color = "red";
        if (req1[1].className == "fa-solid fa-circle-exclamation req1" || req1[1].className == "fa-solid fa-check req1") {
            req1[1].className = "fa-solid fa-xmark req1"
        }
    } else if (password.value.length == 0) {
        for (var index = 0; index < req1.length; index++)
            req1[index].style.color = "var(--black)";
        req1[1].className = "fa-solid fa-circle-exclamation req1"
    }
}

const checkConfirm = () => {
    const password = document.getElementById("password");
    const cpass = document.getElementById('cpass');

    if (password.value != cpass.value && cpass.value.length != 0) {
        document.getElementById("errorPass").style.display = "block";
    } else if (password.value == cpass.value || cpass.value.length == 0) {
        document.getElementById("errorPass").style.display = "none";
    }
}