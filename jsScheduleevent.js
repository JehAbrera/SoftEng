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
		//do nothing
    }
	else {
		document.getElementById("specificSpecial").style.display = 'none';
		document.getElementById("specificDocument").style.display = 'none';
		document.getElementById("chooseCalWed").style.display = 'none';
		document.getElementById("chooseCalBap").style.display = 'none';
		document.getElementById("chooseCalFuner").style.display = 'none';
		document.getElementById("chooseCalIntBless").style.display = 'none';
		document.getElementById("submitButton").style.display = 'none';
		document.getElementById("calDateWed").removeAttribute('required');
		document.getElementById("calDateBap").removeAttribute('required');
		document.getElementById("calDateFuner").removeAttribute('required');
		document.getElementById("calDateIntBless").removeAttribute('required');
		if(ddChooseEvent === "Special Event"){
			document.getElementById("specificSpecial").style.display = 'block';		
			document.getElementById("ddDocument").selectedIndex = 0;
			document.getElementById("calDateFuner").value = "";
		}
		else if(ddChooseEvent === "Mass Intention" || ddChooseEvent === "Blessing"){
			document.getElementById("chooseCalIntBless").style.display = 'block';
			document.getElementById("chooseCalWed").style.display = 'none';
			document.getElementById("chooseCalBap").style.display = 'none';
			document.getElementById("chooseCalFuner").style.display = 'none';
			document.getElementById("submitButton").style.display = 'block';
			document.getElementById("ddDocument").selectedIndex = 0;
			document.getElementById("ddSpecialEvent").selectedIndex = 0;
			document.getElementById("calDateWed").removeAttribute('required');
			document.getElementById("calDateBap").removeAttribute('required');
			document.getElementById("calDateFuner").removeAttribute('required');
			document.getElementById("calDateWed").value = "";
			document.getElementById("calDateBap").value = "";
			document.getElementById("calDateFuner").value = "";
		}
		else if(ddChooseEvent === "Document Request"){
			document.getElementById("specificDocument").style.display = 'block';
			document.getElementById("chooseCalWed").style.display = 'none';
			document.getElementById("chooseCalBap").style.display = 'none';
			document.getElementById("chooseCalFuner").style.display = 'none';
			document.getElementById("submitButton").style.display = 'none';
			document.getElementById("ddSpecialEvent").selectedIndex = 0;
			document.getElementById("calDateWed").removeAttribute('required');
			document.getElementById("calDateBap").removeAttribute('required');
			document.getElementById("calDateFuner").removeAttribute('required');
			document.getElementById("calDateWed").value = "";
			document.getElementById("calDateBap").value = "";
			document.getElementById("calDateFuner").value = "";
		}
	}
}

function openCalendarSpe() {
	var typeSpecial = document.getElementById("ddSpecialEvent").value;
	
    if(typeSpecial === "default"){
		document.getElementById("chooseCalIntBless").style.display = 'block';
		document.getElementById("submitButton").style.display = 'block';
		document.getElementById("chooseCalBap").style.display = 'none';
		document.getElementById("chooseCalFuner").style.display = 'none';
		document.getElementById("chooseCalWed").style.display = 'none';
		document.getElementById("calDateWed").removeAttribute('required');
		document.getElementById("calDateBap").removeAttribute('required');
		document.getElementById("calDateFuner").removeAttribute('required');
		document.getElementById("calDateWed").value = "";
		document.getElementById("calDateBap").value = "";
		document.getElementById("calDateFuner").value = "";
    }
	else if(typeSpecial === "Wedding") {
		document.getElementById("chooseCalWed").style.display = 'block';
		document.getElementById("submitButton").style.display = 'block';
		document.getElementById("chooseCalIntBless").style.display = 'none';
		document.getElementById("chooseCalBap").style.display = 'none';
		document.getElementById("chooseCalFuner").style.display = 'none';
		document.getElementById("ddDocument").selectedIndex = 0;
		document.getElementById("calDateWed").setAttribute('required', '');
		document.getElementById("calDateBap").removeAttribute('required');
		document.getElementById("calDateFuner").removeAttribute('required');
		document.getElementById("calDateBap").value = "";
		document.getElementById("calDateFuner").value = "";
    }
	else if(typeSpecial === "Baptism") {
		document.getElementById("chooseCalBap").style.display = 'block';
		document.getElementById("submitButton").style.display = 'block';
		document.getElementById("chooseCalIntBless").style.display = 'none';
		document.getElementById("chooseCalWed").style.display = 'none';
		document.getElementById("chooseCalFuner").style.display = 'none';
		document.getElementById("ddDocument").selectedIndex = 0;
		document.getElementById("calDateBap").setAttribute('required', '');
		document.getElementById("calDateWed").removeAttribute('required');
		document.getElementById("calDateFuner").removeAttribute('required');
		document.getElementById("calDateWed").value = "";
		document.getElementById("calDateFuner").value = "";
    }
	else if(typeSpecial === "Funeral Mass/Blessing") {
		document.getElementById("chooseCalFuner").style.display = 'block';
		document.getElementById("submitButton").style.display = 'block';
		document.getElementById("chooseCalIntBless").style.display = 'none';
		document.getElementById("chooseCalWed").style.display = 'none';
		document.getElementById("chooseCalBap").style.display = 'none';
		document.getElementById("ddDocument").selectedIndex = 0;
		document.getElementById("calDateFuner").setAttribute('required', '');
		document.getElementById("calDateWed").removeAttribute('required');
		document.getElementById("calDateBap").removeAttribute('required');
		document.getElementById("calDateWed").value = "";
		document.getElementById("calDateBap").value = "";
    }
	else {
		// do nothing
    }
}

function openCalendarDoc() {
	var typeDoc = document.getElementById("ddDocument").value;
	
    if(typeDoc === "default"){
		// do nothing
    }
	else {
		document.getElementById("chooseCalIntBless").style.display = 'block';
		document.getElementById("submitButton").style.display = 'block';
		document.getElementById("chooseCalBap").style.display = 'none';
		document.getElementById("chooseCalFuner").style.display = 'none';
		document.getElementById("chooseCalWed").style.display = 'none';
		document.getElementById("ddSpecialEvent").selectedIndex = 0;
	}
}

function validateFileType(id) {
	var selectedFile = document.getElementById(id).files[0];
	var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/jfif', 'image/tiff', 'image/tif', 'image/avg'];

	if (!allowedTypes.includes(selectedFile.type)) {
		alert('Invalid file type. Please upload a JPEG, PNG, JPG, GIF, JFIF, TIFF, TIF, or AVG file.');
		document.getElementById(id).value = '';
	}
}

function chooseEventView() {
	var ddChooseEventView = document.getElementById("ddEvent").value;

    if(ddChooseEventView === "default"){
		//do nothing
    }
	else {
		document.getElementById("specificSpecial").style.display = 'none';
		document.getElementById("chooseCalWed").style.display = 'none';
		document.getElementById("chooseCalBap").style.display = 'none';
		document.getElementById("chooseCalFuner").style.display = 'none';
		document.getElementById("chooseCalIntBless").style.display = 'none';
		document.getElementById("submitButton").style.display = 'none';
		document.getElementById("calDateWed").removeAttribute('required');
		document.getElementById("calDateBap").removeAttribute('required');
		document.getElementById("calDateFuner").removeAttribute('required');
		document.getElementById("calDateIntBless").removeAttribute('required');
		if(ddChooseEventView === "Special Event"){
			document.getElementById("specificSpecial").style.display = 'block';
			document.getElementById("calDateIntBless").removeAttribute('required');
			document.getElementById("calDateWed").setAttribute('required', '');
			document.getElementById("calDateBap").setAttribute('required', '');
			document.getElementById("calDateFuner").setAttribute('required', '');
			document.getElementById("calDateWed").value = "";
			document.getElementById("calDateBap").value = "";
			document.getElementById("calDateFuner").value = "";
		}
		else if(ddChooseEventView === "Mass Intention" || ddChooseEventView === "Blessing"){
			document.getElementById("chooseCalIntBless").style.display = 'block';
			document.getElementById("chooseCalWed").style.display = 'none';
			document.getElementById("chooseCalBap").style.display = 'none';
			document.getElementById("chooseCalFuner").style.display = 'none';
			document.getElementById("submitButton").style.display = 'block';
			document.getElementById("ddSpecialEvent").selectedIndex = 0;
			document.getElementById("calDateIntBless").setAttribute('required', '');
			document.getElementById("calDateWed").removeAttribute('required');
			document.getElementById("calDateBap").removeAttribute('required');
			document.getElementById("calDateFuner").removeAttribute('required');
			document.getElementById("calDateWed").value = "";
			document.getElementById("calDateBap").value = "";
			document.getElementById("calDateFuner").value = "";
		}
	}
}

function openCalendarSpeView() {
	var typeSpecialView = document.getElementById("ddSpecialEvent").value;
	
    if(typeSpecialView === "default"){
		document.getElementById("chooseCalIntBless").style.display = 'block';
		document.getElementById("submitButton").style.display = 'block';
		document.getElementById("chooseCalBap").style.display = 'none';
		document.getElementById("chooseCalFuner").style.display = 'none';
		document.getElementById("chooseCalWed").style.display = 'none';
		document.getElementById("calDateWed").removeAttribute('required');
		document.getElementById("calDateBap").removeAttribute('required');
		document.getElementById("calDateFuner").removeAttribute('required');
		document.getElementById("calDateWed").value = "";
		document.getElementById("calDateBap").value = "";
		document.getElementById("calDateFuner").value = "";
    }
	else if(typeSpecialView === "Wedding") {
		document.getElementById("chooseCalWed").style.display = 'block';
		document.getElementById("submitButton").style.display = 'block';
		document.getElementById("chooseCalIntBless").style.display = 'none';
		document.getElementById("chooseCalBap").style.display = 'none';
		document.getElementById("chooseCalFuner").style.display = 'none';
		document.getElementById("calDateBap").removeAttribute('required');
		document.getElementById("calDateFuner").removeAttribute('required');
		document.getElementById("calDateIntBless").removeAttribute('required');
		document.getElementById("calDateWed").setAttribute('required', '');
		document.getElementById("calDateBap").value = "";
		document.getElementById("calDateFuner").value = "";
    }
	else if(typeSpecialView === "Baptism") {
		document.getElementById("chooseCalBap").style.display = 'block';
		document.getElementById("submitButton").style.display = 'block';
		document.getElementById("chooseCalIntBless").style.display = 'none';
		document.getElementById("chooseCalWed").style.display = 'none';
		document.getElementById("chooseCalFuner").style.display = 'none';
		document.getElementById("calDateBap").setAttribute('required', '');
		document.getElementById("calDateWed").removeAttribute('required');
		document.getElementById("calDateFuner").removeAttribute('required');
		document.getElementById("calDateIntBless").removeAttribute('required');
		document.getElementById("calDateWed").value = "";
		document.getElementById("calDateFuner").value = "";
    }
	else if(typeSpecialView === "Funeral Mass/Blessing") {
		document.getElementById("chooseCalFuner").style.display = 'block';
		document.getElementById("submitButton").style.display = 'block';
		document.getElementById("chooseCalIntBless").style.display = 'none';
		document.getElementById("chooseCalWed").style.display = 'none';
		document.getElementById("chooseCalBap").style.display = 'none';
		document.getElementById("calDateFuner").setAttribute('required', '');
		document.getElementById("calDateWed").removeAttribute('required');
		document.getElementById("calDateBap").removeAttribute('required');
		document.getElementById("calDateIntBless").removeAttribute('required');
		document.getElementById("calDateWed").value = "";
		document.getElementById("calDateBap").value = "";
    }
	else {
		// do nothing
    }
}

function showDiv() {
	// radio buttons
	var radio1 = document.getElementById("HouseBlessing");
	var radio2 = document.getElementById("CarBlessing");
	var radio3 = document.getElementById("MotorcycleBlessing");
	var radio4 = document.getElementById("StoreBlessing");
	
	// divs
	var div1 = document.getElementById("houseAddDiv");
	var div2 = document.getElementById("emptyDiv1");
	var div3 = document.getElementById("emptyDiv2");
	var div4 = document.getElementById("emptyDiv3");
	var div5 = document.getElementById("storeAddDiv");
	
	// address elements
	var houseAdd = document.getElementById("addressHouse");
	var storeAdd = document.getElementById("addressStore");
	
	if (radio1.checked == true) {
		div1.style.display = "block";
		div2.style.display = "none";
		div3.style.display = "none";
		div4.style.display = "none";
		div5.style.display = "none";
		houseAdd.required = true;
		storeAdd.required = false;
	}
	else if (radio4.checked == true) {
		div1.style.display = "none";
		div2.style.display = "block";
		div3.style.display = "block";
		div4.style.display = "block";
		div5.style.display = "block";
		houseAdd.required = false;
		storeAdd.required = true;
	}
	else {
		div1.style.display = "none";
		div2.style.display = "none";
		div3.style.display = "none";
		div4.style.display = "none";
		div5.style.display = "none";
		houseAdd.required = false;
		storeAdd.required = false;
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
