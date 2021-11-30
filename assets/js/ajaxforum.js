function ajaxCall() {
    $.ajax({
        type: "post",
        url: "PHP/SELECT_FORUM_PUBLICACAO.php",
        success: function (response) {
            $('.publicacoes').html(response)
        }    
    })
}

$(document).ready(function () {
    setInterval(ajaxCall, 500);
});