function click1(){
    document.getElementById("tab1").style.backgroundColor="#44a2ff";
    document.getElementById("tab2").style.backgroundColor="white";
    document.getElementById("tab1_content").style.display="block";
    document.getElementById("tab2_content").style.display="none";
};
function click2(){
    document.getElementById("tab2").style.backgroundColor="#44a2ff";
    document.getElementById("tab1").style.backgroundColor="white";
    document.getElementById("tab2_content").style.display="block";
    document.getElementById("tab1_content").style.display="none";
};
function click3(){
    document.getElementById("tab2_content1").style.display="block";
    document.getElementById("tab2_content2").style.display="none"
};
function click4(){
    document.getElementById("tab2_content2").style.display="block";
    document.getElementById("tab2_content1").style.display="none";
};