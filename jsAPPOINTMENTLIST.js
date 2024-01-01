function openForm(id){
    document.getElementById(id).style.display = "block";
}
function closeForm(id){
    document.getElementById(id).style.display = "none";
}
function openMessage(){
    document.getElementById("canceledConfirm").style.display = "block";
    document.getElementById("submitForm").style.display = "none";
}
function showinput() {
    var text = document.getElementById("otherinput");
    text.style.display = "block";
    text.disabled = false;
}
function hideinput() {
    var text = document.getElementById("otherinput");
    text.style.display = "none";
    text.disabled = true;
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