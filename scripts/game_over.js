var canvas = document.getElementById("game_screen");
var ctx = canvas.getContext("2d");
ctx.font = "30px Comic Sans MS";
ctx.fillStyle = "red";
ctx.textAlign = "center";
ctx.fillText("GAME OVER", canvas.width/2, canvas.height/2)
var top_score=[]


let s=localStorage.getItem("score");

let s_label=document.getElementById("score")
s_label.innerHTML=`Final Score: ${s}`;

let new_score=parseInt(s);
var higher=false;
let r=document.getElementById("tt");





