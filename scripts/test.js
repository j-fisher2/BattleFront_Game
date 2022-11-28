let canvas=document.getElementById("game_screen")
let ctx=canvas.getContext("2d")
const GAME_WIDTH=800;
const GAME_HEIGHT=600;
let SCORE=0;
let LIVES=3;
let img_src=document.getElementById("flame");

class Character{
    constructor(width,height,x){
        this.width=width;
        this.height=height;
        this.x=x;
        this.y=canvas.height-this.height;
        this.vel=3;
        this.speed=0;
        this.projectile=null;
    }
    draw(){
        ctx.fillStyle="#FF0"
        ctx.fillRect(this.x,this.y,this.width,this.height);
    }
    update_pos(dt){
        if(dt===0){
            return;
        }
        if(this.x<=0&&this.speed<0){
            return;
        }
        if(this.x>=GAME_WIDTH-this.width&&this.speed>0){
            return;
        }
        this.x+=this.speed;
    }
    moveLeft(){
        this.speed=-1*this.vel;
    }
    moveRight(){
        this.speed=this.vel;
    }
    fire_projectile(){
        this.projectile=new Projectile(this.x+(this.width/2),this.y,5,13);
    }
    check_collision(objects){
        for(let ob of objects){
            if(ob.x+ob.width>=this.x&&ob.x<=(this.x+this.width)&&ob.y+ob.height>=this.y){
                ob.reset();
                LIVES--;
                
            }
        }
    }
}

class InputHandler{
    constructor(character){
        document.addEventListener("keydown",(event)=>{
            switch(event.keyCode){
                case 37:
                    character.moveLeft();
                    break;
                case 39:
                    character.moveRight();
                    break;
                
                case 32:
                    if(!character.projectile){
                        character.fire_projectile();
                    }
                    break;
            }
        })
        document.addEventListener("keyup",(e)=>{
            switch(event.keyCode){
                case 37:
                    character.speed=0;
                    break;
                
                case 39:
                    character.speed=0;
                    break;
            }
        })
    }
}

class Projectile{
    constructor(x,y,width,height){
        this.x=x;
        this.y=y;
        this.width=width;
        this.height=height;
        this.speed=5;
    }
    update_pos(){
        this.y-=this.speed;
        if(this.y<0){
            return true;
        }
    }
    draw(){
        ctx.fillStyle="#FFF";
        ctx.fillRect(this.x,this.y,this.width,this.height);
    }
    check_collision(objects,character){
        for(let ob of objects){
            if(this.x>=ob.x-this.width&&this.x<=(ob.x+ob.width)&&this.y<=(ob.y+ob.height)){
                console.log("projectile collision")
                ob.reset();
                score+=30;
                console.log(score);
                return true;
            }
        }
        return false;
    }
}

class Obstacle{
    constructor(x,y,speed,active){
        this.x=x;
        this.y=y;
        this.speed=speed;
        this.width=55;
        this.height=70;
        this.active=active;
    }
    update_pos(){
        this.y+=this.speed;
        if(this.y>GAME_HEIGHT){
            this.y=Math.floor(Math.random()*-500)-200
            this.x=Math.floor(Math.random()*GAME_WIDTH)
        }
    }
    
    reset(){
        this.y=Math.floor(Math.random()*-500)-200
        this.x=Math.floor(Math.random()*GAME_WIDTH)
    }
    
    draw(){
        ctx.drawImage(img_src,this.x,this.y,70,70);
    }
}


let last_time=0;
let level=1;
var obstacles=[];

for(let i=0;i<5;i++){
    let x=Math.floor(Math.random()*GAME_WIDTH);
    let y=Math.floor(Math.random()*-500)-200;
    let speed=Math.floor(Math.random()*2)+3;
    obstacles.push(new Obstacle(x,y,speed,true));
}

for(let i=0;i<9;i++){
    let x=Math.floor(Math.random()*GAME_WIDTH);
    let y=Math.floor(Math.random()*-500)-180;
    let speed=Math.floor(Math.random()*2)+4;
    obstacles.push(new Obstacle(x,y,speed,false));
}

for(let i=0;i<10;i++){
    let x=Math.floor(Math.random()*GAME_WIDTH);
    let y=Math.floor(Math.random()*-480)-180;
    let speed=Math.floor(Math.random()*4)+4;
    obstacles.push(new Obstacle(x,y,speed,false));
}

var score=0;

let character=new Character(80,20,canvas.width/2-50)
let obstacle=new Obstacle(20,20,3);
obstacles.push(obstacle);
new InputHandler(character);


function set_obstacles(l){
    if(l==2){
        obstacles=level_two();
    }
}

function loop(timeStamp){
    let dt=timeStamp-last_time;
    last_time=timeStamp;
    ctx.clearRect(0,0,canvas.width,canvas.height);
    character.update_pos(dt);
    character.draw();
    character.check_collision(obstacles);
    obstacle.update_pos(dt);
    obstacle.draw();

    for(let ob of obstacles){
        if(ob.active){
            ob.update_pos();
            ob.draw();
        }
    }

    if(character.projectile){
        let o=character.projectile.update_pos();
        c=character.projectile.check_collision(obstacles,character);
        if(!c){
            character.projectile.draw(); 
        }
        if(o==true||c==true){
            character.projectile=null;
        }
    }
    let s=document.getElementById("btn_2");
    s.innerHTML=`Your Score: ${score}`;
    
    let l=document.getElementById("life");
    l.innerHTML=`Lives: ${LIVES}`
    if(LIVES>0){
        requestAnimationFrame(loop);
    }
    else{
        localStorage.setItem("score",score);
        document.cookie=`final_score=${score}`;
        window.location.replace("../php/game_over.php");
    }
    if(score>=400&&!obstacles[5].active){
        for(let i=5;i<12;i++){
            obstacles[i].active=true;
        }
    }
    if(score>=1000&&!obstacles[12].active){
        for(let i=12;i<21;i++){
            obstacles[i].active=true;
        }
    }
}
loop(0)