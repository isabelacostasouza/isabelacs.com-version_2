$(function(){
    var activeNote = 0;
    var editMode = false;
    
    $('.delete').hide();
    $('#aux').hide();
    
    $.ajax({
        url: "loadNotes.php",
        
        success: function (data){
            $('#myNotes').html(data);    
            clickonNote();
        },
        
        error: function(){
            $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
            $("#alert").fadeIn();
        }
    
    });
    
    $('#addNote').click(function(){
        $('#myNotes').hide();
        $('#addNote').hide();
        $('#editNote').hide();
        $('.delete').hide();
        $('#allNotes').show();
        $('#done').show();
        $('textarea').show();
        $("textarea").val("");
        $.ajax({
            url: "createNote.php",

            success: function (data){
                activeNote = data;  
            },

            error: function(){
                $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                        $("#alert").fadeIn();
            }

        });
    });
    
    $("textarea").keyup(function(){
        $.ajax({
            url: "updateNote.php",
            type: "POST",
            data: {note: $(this).val(), id:activeNote},
            success: function (data){},
            error: function(){
                $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                        $("#alert").fadeIn();
            }

        });
        
    });
    
    
    $('#allNotes').click(function(){
        $('#myNotes').show();
        $('#addNote').show();
        $('#editNote').show();
        $('#allNotes').hide();
        $('.delete').hide();
        $('#done').hide();
        $('textarea').hide();
        
        $.ajax({
        url: "loadNotes.php",
        
        success: function (data){
            $('#myNotes').html(data);     
        },
        
        error: function(){
            $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                    $("#alert").fadeIn();
        }
    
        });
    });
    
    $('#done').click(function(){
        $('.delete').hide();
        $('#allNotes').hide();
        $('#done').hide();
        $('#aux').hide();
        $('textarea').hide();
        $('#myNotes').show();
        $('#addNote').show();
        $('#editNote').show();
        
        $.ajax({
        url: "loadNotes.php",
        
        success: function (data){
            $('#myNotes').html(data);  
            clickonNote();
        },
        
        error: function(){
            $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                    $("#alert").fadeIn();
        }
    
        });
    });
    
    $('#editNote').click(function(){
        $('#addNote').hide();
        $('#editNote').hide();
        $('textarea').hide();
        $('#allNotes').hide();
        $('#aux').show();
        $('#done').show();
        $('.delete').show();
        clickonDelete();
    });
    
    function clickonNote(){
        $(".noteheader").click(function(){
            if(!editMode){
                activeNote = $(this).attr("id");
                $("textarea").val($(this).find('.text').text());

                $('#myNotes').hide();
                $('#addNote').hide();
                $('#editNote').hide();
                $('#allNotes').show();
                $('#done').show();

                $('textarea').show();
                $("textarea").focus();
            }
        });
    }
    
    function clickonDelete(){
        $(".delete").click(function(){
            var deleteButton = $(this);

            $.ajax({
                url: "deleteNote.php",
                type: "POST",
                data: {id:deleteButton.next().attr("id")},
                success: function (data){
                    if(data == 'error'){
                        $('#alertContent').text("There was an issue deleting this note from the database!");
                        $("#alert").fadeIn();
                    }else{
                        deleteButton.parent().remove();
                    }
                    $.ajax({
                        url: "loadNotes.php",

                        success: function (data){
                            $('#myNotes').html(data);    
                            $('.delete').show();
                            clickonDelete();
                        },

                        error: function(){
                            $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                            $("#alert").fadeIn();
                        }

                    });
                },
                error: function(){
                    $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                            $("#alert").fadeIn();
                }

            });
            
        });
    }
    
});