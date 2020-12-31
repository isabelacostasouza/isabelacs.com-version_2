$("#updateUsername").submit(function(event){ 
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    
    $.ajax({
        url: "updateUsername.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateErrors1").html(data);
            }
        },
        error: function(){
            $("#signupmessage").html("<div class='alert alert-danger' style='text-align: center; font-weight: bold;'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    
    });
});

$("#updateEmail").submit(function(event){ 
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    
    $.ajax({
        url: "updateEmail.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateErrors2").html(data);
            }
        },
        error: function(){
            $("#signupmessage").html("<div class='alert alert-danger' style='text-align: center; font-weight: bold;'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    
    });
});

$("#updatePassword").submit(function(event){ 
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    
    $.ajax({
        url: "updatePassword.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateErrors3").html(data);
            }
        },
        error: function(){
            $("#signupmessage").html("<div class='alert alert-danger' style='text-align: center; font-weight: bold;'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    
    });
});