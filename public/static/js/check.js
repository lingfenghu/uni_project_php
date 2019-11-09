function confirm(){
    var pd1 = document.getElementById("pd").value;
    var pd2 = document.getElementById("pdc").value;
    if(pd1!=pd2){
        alert("两次密码不一致")
    }
}

function agree(){
    if(document.getElementById("treaty").checked){
        document.getElementById("bt").disabled=false;
    }else{
        document.getElementById("bt").disabled=true;
    }
}