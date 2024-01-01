const filter = document.getElementById('myFilter');
const inputFilter = document.getElementById('search-input');
const forName = document.getElementById('forName');
const forBDate = document.getElementById('forBDate');
const forEDate = document.getElementById('forEDate');

const filterChange = () => {
    var val = filter.value;

    if (val == 'name') {
        forName.style.display = 'flex';
        forBDate.style.display = 'none';
        forEDate.style.display = 'none';
    } else if (val == 'bday') {
        forBDate.style.display = 'flex';
        forEDate.style.display = 'none';
        forName.style.display = 'none';
    } else if (val == 'eday') {
        forEDate.style.display = 'flex';
        forBDate.style.display = 'none';
        forName.style.display = 'none';
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

const nav = document.getElementById('sideNav');
const bars = document.getElementById('openNav');
const sjcp = document.getElementById('sjcp');
const openNav = () => {
    if (nav.style.width == '0px' || nav.style.width == '') {
        nav.style.width = '250px';
        nav.style.padding = '12px';
        bars.style.display = "none";
        sjcp.style.display = "none";
    } else {
        nav.style.width = '0px';
        nav.style.padding = '0px';
        bars.style.display = "block";
        sjcp.style.display = "unset";
    }
}

const options = document.getElementById('options');
function showoption() {
    if (options.style.display == "none" || options.style.display == "") {
        options.style.display = "flex";
    } else {
        options.style.display = "none";
    }
}