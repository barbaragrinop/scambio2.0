

$("#edit").click(function(){
    var livro = $('#lbedit').val()
    var describe = $('#descedit').val()
    var genero = $('#lbgenero').val()
    var autor = $('#lbautedit').val()
    var codigo = $('#values').val()
    $.ajax({
        type: "post",
        url: "PHP/edit.php",
        data: {
            "livro":livro,
            "describe":describe,
            "genero":genero,
            "autor":autor,
            "codigo":codigo
        },
        success: function (response) {
        }    
    })
})

function Callajaxpub() {
    $.ajax({
        type: "post",
        url: "PHP/select_livro_user.php",
        success: function (response) {
            $('.publicacoes').html(response);
        }
    }) 
}