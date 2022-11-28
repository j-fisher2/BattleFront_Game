var moving=document.getElementById("mai");
var moving_2=document.getElementById("mai2");
var moving_3=document.getElementById("mai3");
var moving_4=document.getElementById("mai4");

var top_score;

var bottom=window.innerHeight;
moving_2.style.left="50vw";
moving_3.style.left="75vw";
moving_4.style.left="35vw";

var pos=-100;
var pos_2=-300;
var pos_3=-400;
var pos_4=-500;

function move(){
    if(pos>=bottom-105){
        pos=-100;
    
    }
    if(pos_2>=bottom-105){
        pos_2=-300;
    }
    if(pos_3>=bottom-105){
        pos_3=-400;
    }
    if(pos_4>=bottom-105){
        pos_4=-500;
    }
    pos+=1;
    pos_2+=1.2;
    pos_3+=0.8;
    pos_4+=1;
    moving.style.top=pos+"px";
    moving_2.style.top=pos_2+"px";
    moving_3.style.top=pos_3+"px";
    moving_4.style.top=pos_4+"px";
}
var t=setInterval(move,1);