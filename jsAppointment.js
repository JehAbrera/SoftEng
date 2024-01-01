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
