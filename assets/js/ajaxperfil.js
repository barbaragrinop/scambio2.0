$(document).ready( () => {
    $.ajax({
        type: "post",
        url: "PHP/select_livro_user.php",
        success: function (response) {
            console.log(response);
            $('.publicacoes').html(response);
        }    
    })
})