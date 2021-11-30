$('#search').keyup(function() {
    var search = $('#search').val();
    ajaxCall()
});

function ajaxCall() {
    var search = $('#search').val();
    $.ajax({
        type: "post",
        url: "PHP/SELECT_FORUM_PUBLICACAO.php",
        data:{
            'search':search,
        },
        success: function (response) {
            $('.publicacoes').html(response)
        }    
    })
}

$(document).ready(function () {
    setInterval(ajaxCall(), 500);
});



