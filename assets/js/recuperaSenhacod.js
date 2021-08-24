$(document).ready(function(){
    $('#frmRecupera').submit(() => {
        var codigo = $('#codigo').val();
        $.ajax({
            type: "post",
            url: "../validarcodigo.php",
            data: {
                "codigo": codigo
            },
            success: function (response) {
                // alert(response);
            }
        });
    });
});