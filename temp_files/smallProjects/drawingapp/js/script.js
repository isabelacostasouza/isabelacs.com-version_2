$(function(){

    $("#slider").slider({
        min: 3,
        max: 30,
        slide: function(event, ui) {
            $("#thickness").height(ui.value);
            $("#thickness").width(ui.value);
        }
    });
    var box = $("#box");
    
    var painting = false;
    var erasing = false;
    var mouse = {x: 0, y: 0};
    
    var canvas = document.getElementById("canvasBox");
    var pincel = canvas.getContext('2d');
    
    //definir tamanho do pincel
    pincel.lineWidth = 3;
    
    //definir cor do pincel
    pincel.strokeStyle = 'black';
    
    //definir formato do pincel
    pincel.lineCap = "round";
    pincel.lineJoin = "round";
    
    if(localStorage.getItem("imgCanvas") != null){
        var img = new Image();
        img.onload = function(){
            pincel.drawImage(img, 0, 0);   
        }
        img.src = localStorage.getItem("imgCanvas");
    };
    
    box.mousedown(function(e){
        painting = true;
        pincel.beginPath();
        mouse.x = e.pageX - this.offsetLeft;
        mouse.y = e.pageY - this.offsetTop;
        pincel.moveTo(mouse.x, mouse.y);
    });
    
    box.mousemove(function(e){
        mouse.x = e.pageX - this.offsetLeft;
        mouse.y = e.pageY - this.offsetTop;
        if(painting == true){
            pincel.lineWidth = $("#slider").slider("value");
            
            if(erasing == false){
                pincel.strokeStyle = document.getElementById("paintColor").value;
            }else{
                pincel.strokeStyle = "white";
            }
            
            pincel.lineTo(mouse.x, mouse.y);
            pincel.stroke();
        }
    });
  
    box.mouseup(function(){
        painting = false;
    });

    box.mouseleave(function(){
        painting = false;
    });
    
    $("#btn1").click(function() {
        if(erasing) {
            erasing = false;
            $("#btn1").css("background-color", "white");
            $("#btn1").css("color", "#5BB4E7");
        }
        else {
            erasing = true;
            $("#btn1").css("background-color", "#5BB4E7");
            $("#btn1").css("color", "white");     
        }
    });
    
    $("#btn2").click(function() {
        if(typeof(localStorage) != null) {
            localStorage.setItem("imgCanvas", canvas.toDataURL());
        }
        else {
            window.alert("Your browse does not suport local storage!");
        }
    });
    
    $("#btn3").click(function() {
        pincel.clearRect(0, 0, canvas.width, canvas.height);
        erasing = false;
        $("#btn1").css("background-color", "white");
        $("#btn1").css("color", "#5BB4E7");
    });
    
    
});