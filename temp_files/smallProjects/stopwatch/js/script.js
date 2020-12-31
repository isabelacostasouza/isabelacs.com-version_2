$(function(){
    
    var milisseconds = 0
    var seconds = 0;
    var minutes = 0;
    
    var lapNumber = 0;
    var lapMilisseconds = 0;
    var lapSeconds = 0;
    var lapMinutes = 0;
    
    var action;
    
    var started = false;
    var stoped = false;
    
    $("#btn1").click(function() {
        if(started == false) {
            started = true;
            $("#btn1").text("Stop");
            start();
        }
        else {
            if(stoped == false) {
                stoped = true;
                $("#btn1").text("Resume");
                $("#btn2").text("Restart"); 
                stop();
            }
            else {
                stoped = false;
                start();
                $("#btn1").text("Stop"); 
                $("#btn2").text("Lap"); 
            }
        }
    });
    
    $("#btn2").click(function() {
        if(started == true && stoped == false) {
            newLap();
        }
        
        else if(started == true && stoped == true) {
            location.reload();
        }
    });
    
    function start() {
        action = setInterval(function(){
            lapMilisseconds++;
            milisseconds++;
            if(milisseconds == 60) {
                milisseconds = 0;
                seconds++;
                if(seconds == 60) {
                    seconds = 0;
                    minutes++;
                }
            }
            if(lapMilisseconds == 60) {
                lapMilisseconds = 0;
                lapSeconds++;
                if(lapSeconds == 60) {
                    lapSeconds = 0;
                    lapMinutes++;
                }
            }
            $("#time1").text(leftPad(lapMinutes) + ":" + leftPad(lapSeconds) + ":" + leftPad(lapMilisseconds));
            $("#time2").text(leftPad(minutes) + ":" + leftPad(seconds) + ":" + leftPad(milisseconds));
        }, 1);
    }
    
    function startLap() {
        lapTimeCounter = 0;
        lapMilisseconds = 0;
        lapSeconds = 0;
        lapMinutes = 0;
    }
    
    function stop() {
        clearInterval(action);
    }
    
    function leftPad(number) {
        var output = number + '';
        while (output.length < 2) {
            output = '0' + output;
        }
        return output;
    }
        
    function newLap() {
        $("#laps").css("background-color", "rgba(255, 255, 255, 0.75)");
        lapNumber++;
        var textAppend = "<div class='lap'><h1 id='numberLap'>Lap " + leftPad(lapNumber) + "</h1><h2 id='timeLap'>" + leftPad(lapMinutes) + ":" + leftPad(lapSeconds) + ":" + leftPad(lapMilisseconds) + "</h2></div>"
        $("#laps").prepend(textAppend);
        startLap();
    }
    
});