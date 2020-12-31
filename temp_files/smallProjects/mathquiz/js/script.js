var playing = false;
var score;
var finalScore;
var timeRemaining;

window.onload = function () {
    
    document.getElementById("startButton").addEventListener("click", start);

    function start() {
        if(playing) {
            location.reload();
        }
        else {
            playing = true; 
            timeRemaining = 30;
            score = 0;
            
            document.getElementById("score").innerHTML = score;
            document.getElementById("timeRemaining").innerHTML = timeRemaining + " sec";
            document.getElementById("gameOverContainer").style.display = "none";
            document.getElementById("timeRemainingContainer").style.display = "block";
            document.getElementById("startButton").innerHTML = "Reset Game";
            startCountdown();
            play();
        }
    };
    
    function play() {
        document.getElementById("answer1").removeEventListener("click", correct);
        document.getElementById("answer2").removeEventListener("click", correct);
        document.getElementById("answer3").removeEventListener("click", correct);
        document.getElementById("answer4").removeEventListener("click", correct);

        document.getElementById("answer1").removeEventListener("click", wrong);
        document.getElementById("answer2").removeEventListener("click", wrong);
        document.getElementById("answer3").removeEventListener("click", wrong);
        document.getElementById("answer4").removeEventListener("click", wrong);
        
        var number1 = Math.round(Math.floor(Math.random() * 9 + 1));
        var number2 = Math.round(Math.floor(Math.random() * 9 + 1));
        document.getElementById("quiz").innerHTML = number1 + "X" + number2;
        var correctAnswer = number1*number2;
        var correctBox = Math.floor(Math.random() * 4)+1;

        document.getElementById("answer" + correctBox).innerHTML = correctAnswer;
        document.getElementById("answer" + correctBox).addEventListener("click", correct);
        
        for(i = 1; i < 5; i++) {
            if(i != correctBox) {
            do{
                var randomNumber = Math.round(Math.floor(Math.random() * 9 + 1))*Math.round(Math.floor(Math.random() * 9 + 1));
            } while(randomNumber == correctAnswer);
                document.getElementById("answer" + i).innerHTML = randomNumber;
                document.getElementById("answer" + i).addEventListener("click", wrong);
            }
        }
    }
    
    function correct() {
        score += 1;
        document.getElementById("score").innerHTML = score;
        document.getElementById("correct").style.display = "block";
        setTimeout(func, 1000);
        function func() {
            setTimeout(document.getElementById("correct").style.display = "none");
        }
        play();
    }
        
    function wrong() {
        document.getElementById("tryAgain").style.display = "block";
        setTimeout(func, 1000);
        function func() {
            setTimeout(document.getElementById("tryAgain").style.display = "none");
        }
    }
    
    function startCountdown() {
        action = setInterval(function() {
            timeRemaining -= 1;
            document.getElementById("timeRemaining").innerHTML = timeRemaining + " sec";
            if(timeRemaining == 0) {
                clearInterval(action);
                
                document.getElementById("correct").style.display = "none";
                document.getElementById("tryAgain").style.display = "none";
                document.getElementById("answer1").innerHTML = "";
                document.getElementById("answer2").innerHTML = "";
                document.getElementById("answer3").innerHTML = "";
                document.getElementById("answer4").innerHTML = "";

                document.getElementById("gameOverContainer").style.display = "block";
                
                finalScore = score;
                document.getElementById("finalScore").innerHTML = finalScore;
                
                score = 0;
                document.getElementById("score").innerHTML = score;
                
                document.getElementById("timeRemainingContainer").style.display = "none";
                document.getElementById("startButton").innerHTML = "Start Game";
                document.getElementById("quiz").innerHTML = "";
                
                playing = false;
            }
        }, 1000);
    }

};

