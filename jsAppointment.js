function openForm(){
    document.getElementById("submitForm").style.display = "block";
}
function closeForm(){
    document.getElementById("submitForm").style.display = "none";
}
function openMessage(){
    document.getElementById("canceledConfirm").style.display = "block";
    document.getElementById("submitForm").style.display = "none";
}


function seemore(id){
    if( document.getElementById(id).style.display == "block"){
        document.getElementById(id).style.display = "none"
    } else {
        document.getElementById(id).style.display = "block"
    }
    
}