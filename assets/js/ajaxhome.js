function ajaxCall() {
    $.ajax({
        type: "post",
        url: "PHP/SELECT_LIVROS_PUBLICADOS.php",
        success: function (response) {
            // console.log(response);
            $('.return').html(response);
        }
    })
}

$(document).ready(function () {
    setInterval(ajaxCall, 500);
});

