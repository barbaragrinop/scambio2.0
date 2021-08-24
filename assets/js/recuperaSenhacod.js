$(document).ready(function(){
    $('#frmRecuperaCodigo').submit(() => {
        var codigo = $('#codigo').val();
        $.ajax({
            type: "post",
            url: "../validarcodigo.php",
            data: {
                "codigo": codigo
            },
            success: function (response) {
                if(response == "Código válido!"){
                    alert(response);
                    window.location.href = "./novaSenha.php";
                }else{
                    alert(response);
                }
            }
        });
    });
});