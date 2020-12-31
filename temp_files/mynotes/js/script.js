$(function(){
    
    $("#formSignup").submit(function(event) {
        event.preventDefault();
        var data = $(this).serializeArray();
        console.log(data);
    });
    
});