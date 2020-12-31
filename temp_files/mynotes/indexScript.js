$("#formSignup").submit(function(event){ 
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    
    $.ajax({
        url: "PHPFiles/signup.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#signupmessage").html(data);
            }
        },
        error: function(){
            $("#signupmessage").html("<div class='alert alert-danger' style='text-align: center; font-weight: bold;'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    
    });
});

$("#formLogin").submit(function(event){ 
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    
    $.ajax({
        url: "PHPFiles/login.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#loginmessage").html(data);
            }
        },
        error: function(){
            $("#loginmessage").html("<div class='alert alert-danger' style='text-align: center; font-weight: bold;'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    
    });
});