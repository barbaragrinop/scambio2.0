function ajaxCall() {
    $.ajax({
        type: "post",
        url: "PHP/SELECT_LIVROS_PUBLICADOS.php",
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
    setInterval(ajaxCall, 500);
    setInterval(ajaxAtualizaNotificoes, 500);
});
