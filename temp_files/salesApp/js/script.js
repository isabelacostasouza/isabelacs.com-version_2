$(function(){

    $("#clientes").addClass("active");     $("#contentBoxEstoque").css("display","none");
    $("#contentBoxVendas").css("display","none");
    
    $(".btn-group > .btn").click(function(){
        $(".btn-group > .btn").removeClass("active");
        $(this).addClass("active");
    });
    
    $("#clientes").click(function(){
        $("#contentBoxClientes").show();
        $("#contentBoxEstoque").css("display","none");
        $("#contentBoxVendas").css("display","none");
    });
    
    $("#estoque").click(function(){
        $("#contentBoxEstoque").show();
        $("#contentBoxClientes").css("display","none");
        $("#contentBoxVendas").css("display","none");
    });
    
    $("#vendas").click(function(){
        $("#contentBoxVendas").show();
        $("#contentBoxClientes").css("display","none");
        $("#contentBoxEstoque").css("display","none");
    });
    
});