//Start Game
const st = document.getElementById('StartButton');
const splash = document.getElementById('SplashScreen');
const canvas = document.getElementById('canvas1');
const endgame = document.getElementById('endgame');
const canvas1 = document.getElementById('canvasback');
const showHighScore = document.getElementById('showHighscore');


st.addEventListener('click', startGame);
//endgame.addEventListener('click', gameOver);

//Canvas 
const ctx = canvas.getContext('2d');
canvas.width = 800;
canvas.height = 500;

let enemySpeed = 1;
let score = 0;
let level = 1;
let templevel = 0;
let gameFrame = 0;
ctx.font = '50px Comic Sans MS';

//Player Const
const playerRight = new Image();
const playerLeft = new Image();

//Mouse Interact
let canvasPosition = canvas.getBoundingClientRect();
//var interval = setInterval(draw, 10);


const mouse = {
    x: canvas.width/2,
    y: canvas.height/2,
    click: false
}
canvas.addEventListener('mousedown', function(e){
    mouse.click = true;
    mouse.x = e.x - canvasPosition.left;
    mouse.y = e.y - canvasPosition.top;
    playerRight.src = 'public/img/mouthopen1flip.png';
    playerLeft.src = 'public/img/mouthopen1.png';
});

canvas.addEventListener('mousemove', function(e){
    mouse.x = e.x - canvasPosition.left;
    mouse.y = e.y - canvasPosition.top;
    mouse.click = false;
});

canvas.addEventListener('mouseup', function(){
    mouse.click = false;
});


window.onresize = function(){
    location.reload();
}

//Random Number Go Getter
var que =  Math.floor((Math.random()*10));

//Sounds
const bubblePop1 = document.createElement('audio'); //bubble pop 1
bubblePop1.src = 'public/sounds/bubbles-single1.wav';
const bubblePop2 = document.createElement('audio'); //bubble pop 2
bubblePop2.src = 'public/sounds/bubbles-single2.wav';

const enemybubblePop1 = document.createElement('audio'); //enemy ballon pop 1
enemybubblePop1.src = 'public/sounds/BalloonPop1.wav';
enemybubblePop1.volume = 0.8;

const winCheer1 = document.createElement('audio'); //win cheer one 1 when highscore > 20
winCheer1.src = 'public/sounds/ChildrenYaySoundEffect.mp3';
winCheer1.volume = 0.08;

const startSound = document.createElement('audio');
startSound.src = 'public/sounds/narutosound.wav'
startSound.volume = 0.08;

const backgroundAudio = [document.createElement('audio'),
                        document.createElement('audio'),
                        document.createElement('audio'),
                        document.createElement('audio'),
                        document.createElement('audio'),
                        document.createElement('audio'),
                        document.createElement('audio'),
                        document.createElement('audio'),
                        document.createElement('audio'),
                        document.createElement('audio')];
backgroundAudio[0].src = 'public/sounds/soupnsoulgameedit.mp3';
backgroundAudio[0].volume = 0.02;
backgroundAudio[1].src = 'public/sounds/green_hill_zone.mp3';
backgroundAudio[1].volume = 0.02;
backgroundAudio[2].src = 'public/sounds/EchoesoftheDamned.mp3';
backgroundAudio[2].volume = 0.02;
backgroundAudio[3].src = 'public/sounds/Abracadavre.mp3';
backgroundAudio[3].volume = 0.02;
backgroundAudio[4].src = 'public/sounds/anotherwinter.mp3';
backgroundAudio[4].volume = 0.02;
backgroundAudio[5].src = 'public/sounds/green_hill_zone.mp3';
backgroundAudio[5].volume = 0.02;
backgroundAudio[6].src = 'public/sounds/bensound-allthat.mp3';
backgroundAudio[6].volume = 0.02;
backgroundAudio[7].src = 'public/sounds/bensound-funnysong.mp3';
backgroundAudio[7].volume = 0.02;
backgroundAudio[8].src = 'public/sounds/bensound-rumble.mp3';
backgroundAudio[8].volume = 0.02;
backgroundAudio[9].src = 'public/sounds/bensound-moose.mp3';
backgroundAudio[5].volume = 0.02;





backgroundAudio[que].volume = 0.08;
backgroundAudio[que].load();


//Player 

playerLeft.src = 'public/img/mouthopen1.png';
playerRight.src = 'public/img/mouthopen1flip.png';
var gameSwitch = true;

class Player {
    constructor(){
        this.x = canvas.width;
        this.y = canvas.height/2;
        this.radius = 40;
        this.angle = 0;
        this.frameX = 0;
        this.frameY = 0;
        this.frame = 0;
        this.spriteWidth = 498;
        this.spriteHeight = 327;
    }
    
    update(){
        const dx = this.x - mouse.x;
        const dy = this.y - mouse.y;
        let theta = Math.atan2(dy, dx);
        this.angle = theta
        if(mouse.x != this.x){
            this.x -= dx/2;
        }
        if(mouse.y != this.y){
            this.y -= dy/1.2;
        }
    }

    draw(){
        //ctx.fillStyle = 'white';
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radius, 0 , Math.PI * 2);
        //ctx.fill();
        ctx.closePath();
        //ctx.fillRect(this.x, this.y, this.radius, 10);


        ctx.save();
        ctx.translate(this.x, this.y);
        ctx.rotate(this.angle);

        if(this.x >= mouse.x){
            ctx.drawImage(playerLeft, 0-51, 0-40, this.spriteWidth/4-20, this.spriteHeight/4)
        }
        else {
            ctx.drawImage(playerRight, 0-51, 0-35, this.spriteWidth/4-20, this.spriteHeight/4)
        }
        ctx.restore();
    }
}
const player = new Player();


const theimg = [document.createElement('img'),
                document.createElement('img'),
                document.createElement('img'),
                document.createElement('img'),
                document.createElement('img'),
                document.createElement('img'),
                document.createElement('img'),
                document.createElement('img'),
                document.createElement('img'),
                document.createElement('img')];
theimg[0].src = 'public/img/food_orange_400.png';
theimg[1].src = 'public/img/food_peapod_400.png';
theimg[2].src = 'public/img/food_cherry_400.png';
theimg[3].src = 'public/img/food_pineapple_400.png';
theimg[4].src = 'public/img/food_carrot_400.png';
theimg[5].src = 'public/img/food_banana_400.png';
theimg[6].src = 'public/img/food_corn_400.png';
theimg[7].src = 'public/img/food_pumpkin_400.png';
theimg[8].src = 'public/img/food_tomato_400.png';
theimg[9].src = 'public/img/food_cherry_400.png';


const enemyimg = [document.createElement('img'),
                document.createElement('img'),
                document.createElement('img'),
                document.createElement('img'),
                document.createElement('img'),
                document.createElement('img'),
                document.createElement('img'),
                document.createElement('img'),
                document.createElement('img'),
                document.createElement('img')];
enemyimg[0].src = 'public/img/food_pizza_400.png';
enemyimg[1].src = 'public/img/food_milkshake_400.png';
enemyimg[2].src = 'public/img/food_pancakes_400.png';
enemyimg[3].src = 'public/img/food_soda_400.png';
enemyimg[4].src = 'public/img/food_onionrings_400.png';
enemyimg[5].src = 'public/img/french_fries.png';
enemyimg[6].src = 'public/img/food_waffles_400.png';
enemyimg[7].src = 'public/img/food_burger_400.png';
enemyimg[8].src = 'public/img/chicken_bucket.png';
enemyimg[9].src = 'public/img/corndog.png';



//Bubbles
const bubblesArray = [];
class Bubble {

    constructor(){
        this.x = Math.random() * canvas.width;
        this.y = canvas.height + 100;
        this.radius = 38;
        this.speed = Math.random() * 5 + (level/2);
        this.distance;
        this.counted = false;
        this.sound = Math.random() <= 0.5 ? 'sound1' : 'sound2';
        this.spriteWidth = 498;
        this.spriteHeight = 327;
        this.e = Math.floor((Math.random()*10));
    }

    


    update(){

        this.y -= this.speed;
        const dx = this.x - player.x;
        const dy = this.y - player.y;
        this.distance = Math.sqrt(dx*dx + dy*dy);
    
    }
    draw(){
        //ctx.fillStyle = 'yellow';
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, true);
        //ctx.fill();
    
        ctx.drawImage(theimg[this.e], this.x-35, this.y-45, this.spriteWidth/4-50, this.spriteHeight/4+5)
        
        ctx.closePath();
        ctx.restore();
    }
}

//Enemy Bubbles
const enemybubblesArray = [];
class EnemyBubble {

    constructor(){
        this.x = Math.random() * canvas.width;
        this.y = canvas.height + 100;
        this.radius = 38;
        this.speed = Math.random() * 2 + level;
        this.distance;
        this.counted = false;
        this.sound = 'sound1';
        this.spriteWidth = 498;
        this.spriteHeight = 327;
        this.e = Math.floor((Math.random()*10));
    }


    update(){
        this.y -= this.speed;
        const dx = this.x - player.x;
        const dy = this.y - player.y;
        this.distance = Math.sqrt(dx*dx + dy*dy);
    
    }
    draw(){
        //ctx.fillStyle = 'red';
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, true);
        //ctx.fill();
        ctx.drawImage(enemyimg[this.e], this.x-25, this.y-45, this.spriteWidth/4-35, this.spriteHeight/4);
        ctx.closePath();
        ctx.restore();
    }
}

function handleBubbles(){

    if (gameFrame % (100) == 0){
        playerLeft.src = 'public/img/mouthopen1.png';
        playerRight.src = 'public/img/mouthopen1flip.png';
        bubblesArray.push(new Bubble());
    }
    for(let i = 0; i < bubblesArray.length; i++){
        bubblesArray[i].update(Player);
        bubblesArray[i].draw();

    }
    for(let i = 0; i < bubblesArray.length; i++){
        if(bubblesArray[i].x < 0 - bubblesArray[i].radius * 2){
            bubblesArray.splice(i, 1);
        }
        if(bubblesArray[i]){
            if(bubblesArray[i].distance < bubblesArray[i].radius + player.radius){
                if(!bubblesArray[i].counted){
                    if(bubblesArray[i].sound == 'sound1') {
                        bubblePop1.play();
                    } else {
                        bubblePop2.play();
                    }
                    playerLeft.src = 'public/img/mouthclosed.png';
                    playerRight.src = 'public/img/mouthclosedflip.png';
                    score++;
                    bubblesArray[i].counted = true;
                    bubblesArray.splice(i, 1);
                    if(score == 5) {
                        level++;
                        templevel++;
                        score = 0;
                        enemySpeed += level;
                    }
                }
            }
        }
    }
}

var chances = 0;

function enemyhandleBubbles() {
    if (gameFrame % (200) == 0){
        playerLeft.src = 'public/img/mouthopen1.png';
        playerRight.src = 'public/img/mouthopen1flip.png';
        enemybubblesArray.push(new EnemyBubble());
    }
    for(let j = 0; j < enemybubblesArray.length; j++){
        enemybubblesArray[j].update(Player)
        enemybubblesArray[j].draw();
        
    }
    for(let j = 0; j < enemybubblesArray.length; j++){
        if(enemybubblesArray[j].x < 0 - enemybubblesArray[j].radius * 2){
            enemybubblesArray.splice(j, 1);
        }

        if(enemybubblesArray[j]){
            if(enemybubblesArray[j].distance < enemybubblesArray[j].radius + player.radius){
                if(!enemybubblesArray[j].counted){
                    if(enemybubblesArray[j].sound == 'sound1')
                        enemybubblePop1.play();
                    playerLeft.src = 'public/img/mouthbadfood.png';
                    playerRight.src = 'public/img/mouthbadfoodflip.png';
                    score--;
                    chances++;
                    enemybubblesArray[j].counted = true;
                    enemybubblesArray.splice(j, 1);
                    if(score == -1 || chances == 3)
                        gameOver();
                }
            }
        }
    }
}


//Animations 
function animate(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    handleBubbles();
    enemyhandleBubbles();
    player.update();
    player.draw();
    ctx.fillStyle = 'black';
    ctx.fillText('Score: ' + score, 7, 50);
    ctx.fillText('Level: ' + level, 550, 50);
    ctx.fillText('Level: ' + level, 550, 50);
    gameFrame++;
    requestAnimationFrame(animate);
    
}

function startGame(){
    console.log("Test Started");
    backgroundAudio[que].play();
    splash.style.display = 'none';
    endgame.style.display = 'inline-block';
    animate();
}

function gameOver() {
    var currentScore = (templevel*5)+score;
    if(currentScore > 20 )
        winCheer1.play();
    location.reload();
}

//Background
const colors = ["#3CC157", "#2AA7FF", "#1B1B1B", "#FCBC0F", "#F85F36"];

const numBalls =30;
const balls = [];

for (let i = 0; i < numBalls; i++) {
  let ball = document.createElement("div");
  ball.classList.add("ball");
  ball.style.background = colors[Math.floor(Math.random() * colors.length)];
  ball.style.left = `${Math.floor(Math.random() * 100)}vw`;
  ball.style.top = `${Math.floor(Math.random() * 100)}vh`;
  ball.style.transform = `scale(${Math.random()})`;
  ball.style.width = `${Math.random()}em`;
  ball.style.height = ball.style.width;
  
  balls.push(ball);
  document.body.append(ball);
}

// Keyframes
balls.forEach((el, i, ra) => {
  let to = {
    x: Math.random() * (i % 2 === 0 ? -11 : 11),
    y: Math.random() * 12
  };

  let anim = el.animate(
    [
      { transform: "translate(0, 0)" },
      { transform: `translate(${to.x}rem, ${to.y}rem)` }
    ],
    {
      duration: (Math.random() + 1) * 2000, // random duration
      direction: "alternate",
      fill: "both",
      iterations: Infinity,
      easing: "ease-in-out"
    }
  );
});