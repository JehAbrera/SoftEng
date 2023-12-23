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

const navbar = document.querySelector('.nav-wrapper');
window.onscroll = () => {
    if (window.scrollY > 50) {
        navbar.classList.add('nav-scrolled');
    } else {
        navbar.classList.remove('nav-scrolled');
    }
};

function triggerSideNav() {
    const side = document.querySelector('.nav-content');
    if (side.className === "nav-content") {
        side.className += " responsive";
      } else {  
        side.className = "nav-content";
      }
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