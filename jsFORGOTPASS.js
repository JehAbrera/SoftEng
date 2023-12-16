const resend = document.getElementById('resend');
window.addEventListener("DOMContentLoaded", () => {
	let count = 25;
	const update = () => {
		resend.innerText = 'Resend OTP in ' + count;
	}

	const countdown = () => {
		update();
		if (count > 0) {
			count--;
			setTimeout(countdown, 1000);
		} else {
			resend.innerHTML = '<input type="submit" name="submit" value="submit">';
		}
	}

	countdown();
});

function toggle (input, icon) {
	var pass = document.getElementById(input.id);
	var eye = document.getElementById(icon.id);
	if (pass.type == "password"){
		pass.type = "text";
		eye.className= "fa-solid fa-eye-slash";
	}
	else {
		pass.type = "password";
		eye.className = "fa-solid fa-eye";
	}
}

const req1 = document.getElementsByClassName("req1");
const req2 = document.getElementsByClassName("req2");
const req3 = document.getElementsByClassName("req3");

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