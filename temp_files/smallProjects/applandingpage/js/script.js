var playing = false;
var lifes = 3;
var score = 0;

$(function(){
    
    $("#startButton").click(function(){
        if(playing) {
            location.reload();
        }
        else {
            setGameBox();
            play();
        }
    });
    
    function play() {
        playing = true;
        
        //change the text of "Start" button to "Reset" button
        $("#startButton").text("Restart Game!");
        $("#startButton").animate({
            "width" : "130px",
        },  
        {
          duration: 50,
          easing: "linear",
        });
        
        //setting score and lifes
        lifes = 3;
        score = 0;
        
        //add the life counter
        $("#lifesBox").show();
        setGameBox();
        $("#lifesBox").append('<img id="life1" src="images/heart.png">');
        $("#lifesBox").append('<img id="life2" src="images/heart.png">');
        $("#lifesBox").append('<img id="life3" src="images/heart.png">');
        
        startGame();
    }

    function startGame() {
        $(".gameBox img").remove();
        generateFruit();
        
        var x = Math.floor(Math.random() * 3) + 1;
        
        action = setInterval(function(){
            $(".gameBox img").css('top', $(".gameBox img").position().top + x)
            if($(".gameBox img").position().top >= $(".gameBox").height()) {
                if(lifes > 1) {
                    $(".gameBox img").remove();
                    generateFruit();
                    if(lifes == 3)
                        $("#life3").remove();
                    else
                        $("#life2").remove();
                    lifes--;
                }
                
                else {
                    $("#life1").remove();
                    $(".gameBox img").remove();
                    $("#lifesBox").hide();
                    $("#score").text(score + ".");
                    $("#score2").text(0);
                    setGameOver();
                    $("#startButton").text("Start Game!");
                    playing = false;
                    clearInterval(action);
                }
            }

        }, 10);
    }
    
    function setGameBox() {
        
    }
    
    function setGameOver() {
         var r = confirm("Game Over!\nYour score is " + score + ".\nDo you want to play again?");
        if (r == true) {
            setGameBox();
            play();
        }
        else
            location.reload();
    }
            
    function generateFruit() {
        
        var sizeScreen = 250;
        //small screens
        if ($(window).width() < 420) 
            sizeScreen = 100;
        //medium screens
        else if ($(window).width() >= 420 &&  $(window).width() <= 992) 
            sizeScreen = 100;
        //big screens    
        else if ($(window).width() > 992 &&  $(window).width() <= 1200)
            sizeScreen = 100;
        //huge screens    
        else
            sizeScreen = 100;
        
        $(".gameBox").append(chooseFruit());
        $(".gameBox img").css({
            'position' : "relative", 
            'left' : Math.floor(Math.random() *
            ($(".gameBox").width() - sizeScreen))
            , 
            'top' : "-50px"
        });
        $(".gameBox img").mouseover(function() {
            clearInterval(action);
            $("#sliceSound")[0].play();
            $(this).hide("explode", 500); 
            setTimeout(auxiliar, 500);
        });
    }
    
    function auxiliar() {
        score++;
        $("#score").text(score);
        $("#score2").text(score);
        startGame();
    }
    
    
    function chooseFruit() {
        var fruits = ['apple', 'banana', 'cherries', 'grapes', 'mango', 'orange', 'peach', 'pear', 'watermelon'];
        var i =  Math.floor(Math.random() * 9);
        var resultado = '<img src="images/' + fruits[i] +'.png">';        
        return resultado;
    }
    
});