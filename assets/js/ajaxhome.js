$('#nmlivro').keyup(function() {
    var livro = $('#nmlivro').val();
    ajaxCall()
});

$('#nmautor').keyup(function() {
    var autor = $('#nmautor').val();
    ajaxCall()
});

$('#uf').change(function() {
    var uf = $('#uf').val();
    ajaxCall()
});

function ajaxCall() {
    var livro = $('#nmlivro').val();
    var autor = $('#nmautor').val();
    var uf = $('#uf').val();
    $.ajax({
        type: "post",
        url: "PHP/SELECT_LIVROS_PUBLICADOS.php",
        data: {
            "livro":livro,
            "autor":autor,
            "uf":uf
        },
        success: function (response) {
            $('.return').html(response);
        }    
    })
}


function ajaxAtualizaNotificoes() {
    $.ajax({
        type: "post",
        url: "PHP/getNotificoes.php",
        success: function (response) {
            $('.notificacoes').html(response);
        }    
    })
}

$(document).ready(function () { 
    setInterval(ajaxAtualizaNotificoes, 500);
});

setInterval(ajaxCall(), 500);



