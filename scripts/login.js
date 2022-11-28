function verify_login(){
    let existing_user=document.getElementById("unamee").value;
    let existing_pass=document.getElementById("pass").value;
    console.log("user: "+existing_user);
}

function button(){
    var elements=document.getElementsByClassName("btn btn-dark");
    elements[0].style.backgroundColor="red";
}

function reset(){
    var elements=document.getElementsByClassName("btn btn-dark");
    elements[0].style.backgroundColor="black";
}