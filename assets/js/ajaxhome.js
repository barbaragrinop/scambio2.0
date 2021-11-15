$(document).ready( () => {
    let filtro = $('input[search]').val();
    $.ajax({
        type: "post",
        url: "PHP/SELECT_LIVROS_PUBLICADOS.php",
        data: {
            "search": filtro,
        },
        success: function (response) {
            console.log(response);
            $('.return').html(response);
        }    
    })
});

