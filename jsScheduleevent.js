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

const login = document.getElementById('login');
const openLogin = () => {
    if (login.style.display == "none" || login.style.display == "") {
        login.style.display = "block"
        document.body.style.height = "100%";
        document.body.style.overflow = "hidden";
    } else {
        login.style.display = "none"
        document.body.style.height = "auto";
        document.body.style.overflow = "unset";
    }
}


function chooseEvent() {
    var ddChooseEvent = document.getElementById("ddEvent").value;

    if(ddChooseEvent === "default"){
		document.getElementById("specificSpecial").style.display = 'block';
		document.getElementById("specificMassInt").style.display = 'block';
        document.getElementById("specificBlessing").style.display = 'block';
        document.getElementById("specificDocument").style.display = 'block';
		document.getElementById("chooseCal").style.display = 'block';
		document.getElementById("submitbtn").style.display = 'block';
    }
	else {
		document.getElementById("specificSpecial").style.display = 'none';
    document.getElementById("specificDocument").style.display = 'none';
		document.getElementById("chooseCal").style.display = 'none';
		document.getElementById("submitbtn").style.display = 'none';
		if(ddChooseEvent === "Special Event"){
			document.getElementById("specificSpecial").style.display = 'block';			
		}
		else if(ddChooseEvent === "Mass Intention" || ddChooseEvent === "Blessing"){
			document.getElementById("chooseCal").style.display = 'block';
      document.getElementById("submitbtn").style.display = 'block';
		}
		else if(ddChooseEvent === "Document Request"){
			document.getElementById("specificDocument").style.display = 'block';
    }
  }
}


function openCalendar() {
    var typeSpecial = document.getElementById("ddSpecialEvent").value;

    if(typeSpecial === "default"){
		document.getElementById("chooseCal").style.display = 'none';
    }
	else {
		document.getElementById("chooseCal").style.display = 'block';
		document.getElementById("submitbtn").style.display = 'block';
    }
}

const openForm = item => {
    if (document.getElementById(item.id).style.display == "none" || document.getElementById(item.id).style.display == "") {
        document.getElementById(item.id).style.display = "flex";

        for (var index = 0; index < inputArray.length; index++)
            inputArray[index].readOnly = true;

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

/*Everything except weekend days
const validate = (dateString, val) => {
	const day = (new Date(dateString)).getDay();
  if (val == "Special") {
	  if (day==1 || day==0) {
		return false;
	  }
	  return true;
  }
  if (val == "Blessing") {
	  if (day==1 || day==0) {
		return false;
	  }
	  return true;
  }
  if (val == "Document") {
	  if (day==1) {
		return false;
	  }
	  return true;
  }
}

// Sets the value to '' in case of an invalid date
document.querySelector('input').onchange = evt => {
	var typeEvent = document.getElementById("ddEvent").value
  if (!validate(evt.target.value, typeEvent)) {
    evt.target.value = '';
  }
}*/
