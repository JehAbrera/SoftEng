const submit = document.getElementById('submit');
const clear = document.getElementById('clear');
inputArray = document.getElementsByTagName("input");
const req1 = document.getElementsByClassName("req1");
const req2 = document.getElementsByClassName("req2");
const req3 = document.getElementsByClassName("req3");

const openForm = item => {
    if (document.getElementById(item.id).style.display == "none" || document.getElementById(item.id).style.display == "") {
        document.getElementById(item.id).style.display = "flex";

    } else {
        document.getElementById(item.id).style.display = "none";

    }
}

const clearReq = () => {
    for (var index = 0; index < req1.length; index++) {
        req1[index].style.color = "var(--black)";
    }
    req1[1].className = "fa-solid fa-circle-exclamation req1"
    for (var index = 0; index < req2.length; index++) {
        req2[index].style.color = "var(--black)";
    }
    req2[1].className = "fa-solid fa-circle-exclamation req2"
    for (var index = 0; index < req3.length; index++) {
        req3[index].style.color = "var(--black)";
    }
    req3[1].className = "fa-solid fa-circle-exclamation req3"
}

const passReq2 = /^(?=.*[A-Z])(?=.*[a-z])/;
const passReq3 = /^(?=.*[!@#$%^&*])/;

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
        req1[1].className = "fa-solid fa-circle-exclamation req1";
        for (var index = 0; index < req2.length; index++)
            req2[index].style.color = "var(--black)";
        req2[1].className = "fa-solid fa-circle-exclamation req2";
        for (var index = 0; index < req3.length; index++)
            req3[index].style.color = "var(--black)";
        req3[1].className = "fa-solid fa-circle-exclamation req3";
    }

    // password requirement 2
    if(password.value.match(passReq2)) {
        for (var index = 0; index < req2.length; index++)
            req2[index].style.color = "green";
        if (req2[1].className == "fa-solid fa-circle-exclamation req2" || req2[1].className == "fa-solid fa-xmark req2") {
            req2[1].className = "fa-solid fa-check req2"
        }
    } else if (!password.value.match(passReq2) && password.value.length > 0) {
        for (var index = 0; index < req2.length; index++)
            req2[index].style.color = "red";
        if (req2[1].className == "fa-solid fa-circle-exclamation req2" || req2[1].className == "fa-solid fa-check req2") {
            req2[1].className = "fa-solid fa-xmark req2"
        }
    }

    // pass req 3
    if(password.value.match(passReq3)) {
        for (var index = 0; index < req3.length; index++)
            req3[index].style.color = "green";
        if (req3[1].className == "fa-solid fa-circle-exclamation req3" || req3[1].className == "fa-solid fa-xmark req3") {
            req3[1].className = "fa-solid fa-check req3"
        }
    } else if (!password.value.match(passReq3) && password.value.length > 0) {
        for (var index = 0; index < req2.length; index++)
            req3[index].style.color = "red";
        if (req3[1].className == "fa-solid fa-circle-exclamation req3" || req3[1].className == "fa-solid fa-check req3") {
            req3[1].className = "fa-solid fa-xmark req3"
        }
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

const isNumber = evt => {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function toggle(input,icon) {
    var pass = document.getElementById(input.id);
    var eye = document.getElementById(icon.id);
    if (pass.type == "password") {
        pass.type = "text";
        eye.className = "fa-solid fa-eye-slash";
    } else {
        pass.type = "password";
        eye.className = "fa-solid fa-eye";
    }
}

function checkReq() {
    const password = document.getElementById('password');
    const submitReg = document.getElementById('regSub');
    if (password.value.length >= 8 && password.value.match(passReq2) && password.value.match(passReq3)) {
        submitReg.disabled = "false";
    } else {
        submitReg.disabled = "true";
    }
}
