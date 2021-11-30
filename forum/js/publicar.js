$('#pub').click(() => {
    var publicacao = $("#publicacao").val()
    var genero = $("#genero").val();
    $.ajax({
        type: "post",
        url: "PHP/PUBLICAR.php",
        data:{
            "publicacao":publicacao,
            "genero":genero
        },
        success: function (response) {
            alert(response);
        }    
    })
})