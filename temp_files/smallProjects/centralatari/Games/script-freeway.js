var gameOver = false;
var gameover2 = 0;

   var canvas = document.getElementById("canvas");
   var contexto = canvas.getContext("2d");

   function desenhaFundo() {
     //preenche o fundo com cinza escuro
     contexto.fillStyle = "dimgray";
     contexto.fillRect(0, 0, canvas.width, canvas.height);

     //calcada superior
     contexto.fillStyle = "lightgray";
     contexto.fillRect(0, 0, canvas.width, 80);

     //calcada inferior
     contexto.fillStyle = "lightgray";
     contexto.fillRect(0, 380, canvas.width, 100);

     //faixas
     contexto.fillStyle = "white";
     for (var i = 0; i < 25; i++) {
       contexto.fillRect(i * 30 - 5, 185, 20, 4);
       contexto.fillRect(i * 30 - 5, 280, 20, 4);
     }
   }

   var pontos = 0;
   function desenhaPontos() {
     contexto.fillStyle = "black";
     contexto.font = "12pt Monospace";
     contexto.fillText(pontos, 5, 20);
   }

   function Sprite(caminhoDaImagem, xInicial, yInicial) {
     this.x = xInicial;
     this.y = yInicial;

     this.imagem = new Image();
     this.imagem.src = caminhoDaImagem;

     var that = this;
     this.imagem.onload = function () {
       that.largura = that.imagem.width;
       that.altura = that.imagem.height;
       that.desenhaImagem();
     }

     this.desenhaImagem = function () {
       contexto.drawImage(this.imagem, this.x, this.y, this.largura, this.altura);
       contexto.strokeStyle = "darkred";
       contexto.lineWidth = 0.2;
       contexto.strokeRect(this.x, this.y, this.largura, this.altura);
     }

     this.move = function (dx, dy) {
       this.x += dx;
       this.y += dy;

       //limites
       if (this.x > canvas.width) {
         this.x = -this.largura;
       } else if (this.x < -this.largura) {
         this.x = canvas.width;
       }
       if (this.y > canvas.height - this.altura + 5) {
         this.y -= dy;
       } else if (this.y <= -5) {
         this.y = canvas.height - this.altura;
       }
     }

     this.colidiu = function (outro) {
       var colidiuNoXTopo = outro.x >= this.x && outro.x <= (this.x + this.largura);
       var colidiuNoYTopo = outro.y >= this.y && outro.y <= (this.y + this.altura);
       var colidiuNoXBase = (outro.x + outro.largura) >= this.x && (outro.x + +outro.largura) <= (this.x + this.largura);
       var colidiuNoYBase = (outro.y + outro.altura) >= this.y && (outro.y + outro.altura) <= (this.y + this.altura);
       return (colidiuNoXTopo && colidiuNoYTopo) || (colidiuNoXBase && colidiuNoYBase);
     }

   }

   var dilminha = new Sprite("../Imagens/dilminha.png", 320, 400);
   dilminha.passou = function () {
     if (this.y <= 0) {
       this.y = canvas.height - this.altura;
       return true;
     }
     return false;
   }

   var carrinhoAmarelo = new Sprite("../Imagens/carrinho-amarelo.png", -10, 300);
   var carrinhoAzul = new Sprite("../Imagens/carrinho-azul.png", 560, 200);
   var carrinhoPolicia = new Sprite("../Imagens/carrinho-policia.png", 10, 100);

   document.onkeydown = function (event) {
     if (gameOver) {
       return;
     }

     switch (event.which) {
     case 37: //pra esquerda
       dilminha.move(-10, 0);
       break;
     case 38: //pra cima
       dilminha.move(0, -10);
       break;
     case 39: //pra direita
       dilminha.move(10, 0);
       break;
     case 40: //pra baixo
       dilminha.move(0, 10);
       break;
     }

     if (dilminha.passou()) {
       pontos++;
     }
   }

   function reload(){
   	document.location.reload();
   }

   function gameovertext() {
   	let ap = document.getElementById("box");
   	var aux = document.createElement("H1");
   	aux.classList.add("h12");
   	aux.innerHTML = "VOCE PERDEU";
   	ap.appendChild(aux);
   }

   function playbutton() {
       let btn = document.createElement("BUTTON");
       let ap = document.getElementById("box");
       var t = document.createTextNode("Jogar Novamente");
       btn.appendChild(t);
       ap.appendChild(btn);
       btn.classList.add("buttonplay");
       btn.addEventListener("click", reload);
   }

   function removetext() {
     ap.removeChild(aux);
   }

   function removebutton(){
     ap.removeChild(btn);
   }

   setInterval(function () {
     desenhaFundo();
     desenhaPontos();

     dilminha.desenhaImagem();
     carrinhoAmarelo.desenhaImagem();
     carrinhoAzul.desenhaImagem();
     carrinhoPolicia.desenhaImagem();

     carrinhoAmarelo.move(7, 0);
     carrinhoAzul.move(-5, 0);
     carrinhoPolicia.move(10, 0);

     if (carrinhoAmarelo.colidiu(dilminha) || carrinhoAzul.colidiu(dilminha) || carrinhoPolicia.colidiu(dilminha)) {
       gameOver = true;

     }
     if (gameOver) {
       carrinhoAmarelo = new Sprite("../Imagens/carrinho-amarelo.png", -10, 300);
       carrinhoAzul = new Sprite("../Imagens/carrinho-azul.png", 560, 200);
       carrinhoPolicia = new Sprite("../Imagens/carrinho-policia.png", 10, 100);
       /*setInterval(reload, 3000);*/
       for (gameover2; gameover2<1; gameover2++) {
         playbutton();
       }
     }


   }, 50);
