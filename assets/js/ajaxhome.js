$(document).ready( () => {
    $.ajax({
        type: "post",
        url: "PHP/SELECT_LIVROS_PUBLICADOS.php",
        success: function (response) {
            console.log(response);
            $('.return').html(response);
        }    
    })
});



