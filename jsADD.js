const openForm = item => {
    if (document.getElementById(item.id).style.display == "none" || document.getElementById(item.id).style.display == "") {
        document.getElementById(item.id).style.display = "flex";

        submit.disabled = true;
        clear.disabled = true;
    } else {
        document.getElementById(item.id).style.display = "none";

        submit.disabled = false;
        clear.disabled = false;
    }
}

let text = document.getElementById('text');
let count = document.getElementById('count');

const checkChar = () => {
    count.innerHTML = text.value.length + " / 200";
}

let clear = document.getElementById('clear');
clear.addEventListener ("click", function() {
    count.innerHTML = "0 / 200";
})

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